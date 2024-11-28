<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class orders
{
    public $orderModel;
    public $order;

    public function __construct()
    {
        $this->orderModel = new order();
        $this->order = new order();
    }
    public function render_List_Order()
    {
        $limit = 12;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 10;
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            $order_action = $this->orderModel->action_history($action, $limit, $offset);
        }
        $orders = $this->orderModel->get_All_Order($limit, $offset);
        require_once "order/list_orders.php";
    }
    public function updateOrderStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
            $order_id = $_POST['order_id'];
            $status = "Đã Xác Nhận";
            $this->orderModel->updateStatus($order_id, $status);
            header("Location: index.php?act=list_orders");
            exit();
        }
    }
    public function confirm_order()
    {

        if (empty($_POST['checkbox'])) {
            echo "<script>";
            echo "alert('Vui Lòng Lựa Chọn 1 Đơn Hàng');";
            echo "window.location.href='?act=list_orders&action=Chờ Xử Lý';";
            echo "</script>";
            exit;
        }
        if (isset($_POST['checkbox'])) {
            $checkbox = $_POST['checkbox'];
        }
        if (isset($_POST['action_future'])) {
            $action_future = $_POST['action_future'];
        }
        if ($_POST['action_future'] == "Đã Xác Nhận") {
            foreach ($checkbox as $order_id) {
                $data_item_cart = $this->orderModel->detail_shopingCart($order_id);
                $conten = "";  
                
             
                foreach ($data_item_cart as $data) {
                    $name_products = $data['name'];
                    $quantity = $data['quantity'];
                    $size = $data['size'];
                    $color = $data['color'];
                    $price = $data['subtotal'];
                    $conten .= "<tr>
                        <td>{$name_products}</td>
                        <td>{$quantity}</td>
                        <td>{$size}</td>
                        <td>{$color}</td>
                        <td>" . number_format($price, 0, ',', '.') . " VND</td>
                    </tr>";
                }
            
                $data_cart = $this->orderModel->select_orderAll($order_id);
                foreach ($data_cart as $data_user) {
                    $name = $data_user['recipient_name'];
                    $total = $data_user['total_amount'];
                    $key_limited = $data_user['key_limited'];
                    $email = $data_user['email'];
                    $conten_voucher = "";
                    
                    // Xử lý voucher
                    if ($data_user['voucher_id'] != 0) {
                        $conten_voucher = "Bạn được giảm giá " . ($data_user['discount_percent'] * 100) . "%";
                    }
            
                    // Tạo nội dung email
                    $emailContent = "
                        <h2>Đơn hàng của bạn đã được đặt thành công!</h2>
                        <p>Xin chào <strong>{$name}</strong>,</p>
                        <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin đơn hàng của bạn:</p>
                        <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Kích Cỡ</th>
                                    <th>Màu Sắc</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                {$conten}
                            </tbody>
                        </table>
                        <p><strong>Tổng tiền:</strong> " . number_format($total, 0, ',', '.') . " VND</p>
                        <p>$conten_voucher</p>
                        <p><strong>Mã tra cứu đơn hàng:</strong> {$key_limited}</p>
                        <p>Vui lòng sử dụng mã này để kiểm tra trạng thái đơn hàng của bạn trên hệ thống của chúng tôi.</p>
                        <p>Trân trọng,<br>Đội ngũ hỗ trợ khách hàng Nhóm 11 Dự Án 1</p>";
            
                    // Gửi email cho khách hàng
                    try {
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = BASE_MAIL;
                        $mail->Password = BASE_PASS;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;
                        $mail->setFrom(BASE_MAIL, 'FPL SHOP');
                        $mail->addAddress($email);
                        $mail->isHTML(true);
                        $mail->Subject = 'Thông báo đơn hàng';
                        $mail->Body = $emailContent;
                        $mail->send();
                    } catch (Exception $e) {
                        echo "<script>alert('Không thể gửi email: {$mail->ErrorInfo}');</script>";
                    }
                }
            }
        }

        foreach ($checkbox as $order_id) {
            $this->orderModel->change_action($action_future, $order_id);
        }
        echo "<script>";
        echo "alert('Thành Công');";
        echo "window.location.href='?act=list_orders&action=$action_future';";
        echo "</script>";
    }
    public function delivery()
    {

        if (isset($_GET['name'])) {
            $change = $_GET['name'];
        }

        if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
        }
        if ($change == "Đã Xác Nhận") {
            $data_item_cart =  $this->orderModel->detail_shopingCart($order_id);
            $data_cart = $this->orderModel->select_order($order_id);
            $name = $data_cart['recipient_name'];
            $total = $data_cart['total_amount'];
            $key_limited = $data_cart['key_limited'];
            $email = $data_cart['email'];
            $conten = "";
            $conten_voucher = "";
            if ($data_cart['voucher_id'] != 0) {
                $conten_voucher = "Bạn được giảm giá " . ($data_cart['voucher_id'] * 100) . "%";
            }
            foreach ($data_item_cart as $data) {
                $name_products = $data['name'];
                $quantity = $data['quantity'];
                $size = $data['size'];
                $color = $data['color'];
                $price = $data['subtotal'];
                $conten .= "<tr>
                <td>{$name_products}</td>
                <td>{$quantity}</td>
                <td>{$size}</td>
                <td>{$color}</td>
                <td>" . number_format($price, 0, ',', '.') . " VND</td>
            </tr>";
            }
            $emailContent = "
            <h2>Đơn hàng của bạn đã được đặt thành công!</h2>
            <p>Xin chào <strong>{$name}</strong>,</p>
            <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin đơn hàng của bạn:</p>
            <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Kích Cỡ</th>
                        <th>Màu Sắc</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    {$conten}
                </tbody>
            </table>
            <p><strong>Tổng tiền:</strong> " . number_format($total, 0, ',', '.') . " VND</p>
            <p>$conten_voucher</p>
            <p><strong>Mã tra cứu đơn hàng:</strong> {$key_limited}</p>
            <p>Vui lòng sử dụng mã này để kiểm tra trạng thái đơn hàng của bạn trên hệ thống của chúng tôi.</p>
            <p>Trân trọng,<br>Đội ngũ hỗ trợ khách hàng Nhóm 11 Dự Án 1</p>";
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = BASE_MAIL;
                $mail->Password = BASE_PASS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->setFrom(BASE_MAIL, 'FPL SHOP');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Thông báo đơn hàng';
                $mail->Body = $emailContent;
                $mail->send();
            } catch (Exception $e) {
                echo "<script>alert('Đặt hàng thành công nhưng không thể gửi email: {$mail->ErrorInfo}');</script>";
            }
        }
        $action = $_GET['action'];
        $this->orderModel->change_action($change, $order_id);
        echo "<script>";
        echo "alert('Thành Công');";
        echo "window.location.href='?act=list_orders&action=$action';";
        echo "</script>";
    }
    public function render_detail_shoping_cart()
    {
        if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            $data_item_cart =  $this->orderModel->detail_shopingCart($order_id);
        }
        require_once "./user/detail_order.php";
    }
    public function update_info(){
        if(isset($_GET['order_id'])){
            $order_id= $_GET['order_id'];
        $data_update = $this->orderModel->select_order($order_id);
        }
        require_once "order/update.php";
    }
    public function post_update(){
        $order_id = $_GET['order_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $this->orderModel->update_info($name,$phone,$address,$email,$note,$order_id);
        echo "<script>";
        echo "alert('Thành Công');";
        echo "window.location.href='?act=list_orders&action=Chờ Xử Lý';";
        echo "</script>";
    }
}

$Order = new orders();
