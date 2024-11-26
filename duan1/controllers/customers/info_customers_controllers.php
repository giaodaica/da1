<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class controller_Customers
{
    public $gift;
    public $info;
    public $order_item;
    public $order_item_detail;
    public $categories;
    public $product;
    public function __construct()
    {
        $this->info = new customers_models();
        $this->gift = new Voucher_model();
        $this->order_item = new order; // bảng order
        $this->order_item_detail = new order_detail();
        $this->categories = new Categories_models();
        $this->product = new products();
    }
    public function renderInfo()
    {
        session_start();
        $d = $this->categories->select();

        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $data_Custm = $this->info->renderInfo($id);
        $premium = $this->order_item->premium_user($id);

        }
        if (isset($_SESSION['id'])) {
            $data_Gift = $this->gift->select_Gift_byUserID($_SESSION['id']);
        }
        require_once "customers/info.php";
    }
    public function render_Infodetail()
    {
        session_start();
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $data_Custm = $this->info->renderInfo($id);
        $premium = $this->order_item->premium_user($id);

        $d = $this->categories->select();

        }
        if (isset($_SESSION['id'])) {
            $data_Gift = $this->gift->select_Gift_byUserID($_SESSION['id']);
        }
        require_once "customers/info_detail.php";
    }
    public function hander_insert_info()
    {
        session_start();
        $error = "";
        $full_name = $_POST['full_name'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $date_of_birth = $_POST['date_of_birth'];
        $email = $_POST['email_users'];
        
        // Kiểm tra Tên
        if (strtolower(trim($full_name)) == "") {
            $error = "Tên không được để trống";
            $this->showError($error);
            return;
        }
        if (strlen($full_name) < 5) {
            $error = "Tên phải chứa 5 ký tự trở lên";
            $this->showError($error);
            return;
        }
        if (preg_match("/\d/", $full_name)) {
            $error = "Tên không được chứa số";
            $this->showError($error);
            return;
        }

        // Kiểm tra Giới tính
        if ($gender == "") {
            $error = "Giới tính không được để trống";
            $this->showError($error);
            return;
        }

        // Kiểm tra Số điện thoại
        if (strtolower(trim($phone)) == "") {
            $error = "Số điện thoại không được để trống";
            $this->showError($error);
            return;
        }
        if (strlen($phone) !== 10 || !ctype_digit($phone) || $phone[0] !== '0') {
            $error = "Số điện thoại phải bao gồm đúng 10 chữ số, bắt đầu bằng số 0 và chỉ chứa chữ số";
            $this->showError($error);
            return;
        }
        // Kiểm tra Địa chỉ
        if (strtolower(trim($address)) == "") {
            $error = "Địa chỉ không được để trống";
            $this->showError($error);
            return;
        }
        if (strlen($address) < 10) {
            $error = "Địa chỉ phải dài ít nhất 10 ký tự";
            $this->showError($error);
            return;
        }

        // Kiểm tra Ngày sinh
        if (strtolower(trim($date_of_birth)) == "") {
            $error = "Ngày sinh không được để trống";
            $this->showError($error);
            return;
        }
        $today = date("Y-m-d");
        if ($date_of_birth >= $today) {
            $error = "Ngày sinh không thể là hôm nay hoặc trong tương lai";
            $this->showError($error);
            return;
        }

        $phone = $_POST['phone'];
        $checkphone =  $this->info->select_phone($phone);
        if ($checkphone) {
            $error = "Số Điện Thoại Đã Tồn Tại Vui Lòng Nhập Số Điện Thoại Khác";
            $this->showError($error);
            return;
        }
        $email = $_POST['email_users'];
        $checkmail =  $this->info->select_email($email);
        if ($checkmail) {
            $error = "Email Đã Tồn Tại Vui Lòng Nhập Email Khác";
            $this->showError($error);
            return;
        }


        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['id'];
            $this->info->insert_info_ctm($user_id, $full_name,$email, $phone, $address, $gender, $date_of_birth);
            echo "<script>";
            echo "alert('Cập nhật thành công hãy xác nhận email để hoàn tất');";
            echo "window.location.href = '?act=info_detail';";
            echo "</script>";
        }
    }
    public function hander_update_info()
    {
        session_start();
        $error = "";
        $full_name = $_POST['full_name'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $date_of_birth = $_POST['date_of_birth'];
        $email = $_POST['email_users'];
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['id'];
            $this->info->update_info_ctm($user_id, $full_name,$email,$phone, $address, $gender, $date_of_birth);
            echo "<script>";
            echo "alert('Cập nhật thành công');";
            echo "window.location.href = '?act=info_detail';";
            echo "</script>";
        }
    }


    public function history_shop()
    {

        session_start();

        $limit = 5;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 5;
        $d = $this->categories->select();

        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $data_Custm = $this->info->renderInfo($id);
        $premium = $this->order_item->premium_user($id);

        }

        $data_cart_item_edit = $this->order_item->select_order($id, $limit, $offset);
        require_once "./customers/history_buy_product.php";
    }
    public function detail_shoping_cart()
    {
        session_start();
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $data_Custm = $this->info->renderInfo($id);
            $order_id = $_GET['order_id'] ?? 0;
            $data_cart_item_edit = $this->order_item->select_order_by_order_id($order_id);
            $data_item = $this->order_item_detail->select_items_cart($order_id);
        $premium = $this->order_item->premium_user($id);

        }

        require_once "./customers/detail_shoping_cart.php";
    }
    public function cancel_shoping()
    {
        session_start();

        if (isset($_GET['id_order'])) {
            $order_id = $_GET['id_order'];
        }
        if ($_SESSION['id']) {
            $id_user = $_SESSION['id'];
        $premium = $this->order_item->premium_user($id_user);

        }
        // $this->order_item->cancel($order_id);
        $data_item = $this->order_item_detail->select_items_cart($order_id);
        $check_voucher_in_order = $this->order_item->select_order_by_order_id($order_id);
        foreach($data_item as $item){
            $quantity = $item['quantity'];
            $this->product->update_quantity_sold_where_users_cancel_shoping($quantity,$item['product_id']);
            $this->product->update_stock_quantity_where_users_cancel_shoping($quantity,$item['product_id']);
        }
        if ($check_voucher_in_order['voucher_id']) {
            $voucher_id = $check_voucher_in_order['voucher_id'];
            $this->gift->add_voucher_if_delete_order_true_voucher($id_user, $voucher_id);
        }
        $this->order_item->cancel($order_id);
        // kiểm tra xem đơn hủy có dùng voucher k nếu có phải add lại cho nó 
        echo "<script>";
        echo "alert('Hủy thành công');";
        echo "window.location.href = '?act=history_shop';";
        echo "</script>";
    }
    public function sendOtp()
    {
        session_start();
        // Kiểm tra xem có dữ liệu email trong POST không
        $email = $_POST['email'] ?? '';

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $otp = rand(100000, 999999); // Tạo mã OTP
            $expireTime = time() + 300; // Thời gian hết hạn OTP (5 phút)

            // Lưu OTP và thời gian hết hạn vào session
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_expire'] = $expireTime;

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = BASE_MAIL;
                $mail->Password = BASE_PASS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom(BASE_MAIL, 'OTP MAIL');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Mã OTP';
                $mail->Body = "Mã OTP của bạn là: <strong>$otp</strong><br>
                               Mã OTP này sẽ hết hạn sau 5 phút kể từ thời điểm gửi.";

                $mail->send();
                echo json_encode(['success' => true, 'message' => 'OTP đã được gửi tới email của bạn.']);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => "Gửi email thất bại: {$mail->ErrorInfo}"]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Email không hợp lệ.']);
        }
    }

    public function confirm_email()
    {
        session_start();
        if (isset($_POST['otp'])) {
            $otp = $_POST['otp'];
        }
        if (isset($_SESSION['otp'])) {
            $otp_check = $_SESSION['otp'];
        }
        if ($otp == $otp_check) {
            $user_id = $_SESSION['id'];
            $this->info->authen_mail($user_id);
            echo "<script>";
            echo "alert('Xác thực thành công');";
            echo "window.location.href = '?act=info_detail';";
            echo "</script>";
        }
    }
    public function action_history()
    {
        session_start();
        $limit = 5;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 5;
        $action = $_GET['action'];
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $data_Custm = $this->info->renderInfo($id);
        $premium = $this->order_item->premium_user($id);

        }
        $d = $this->categories->select();

        $data_cart_item_edit = $this->order_item->action_history($action, $id, $limit, $offset);
        require_once "customers/action_history_buy_products.php";
    }
    public function showError($error)
    {
        require_once "customers/info_detail.php";
    }
}
$customers = new controller_Customers;
