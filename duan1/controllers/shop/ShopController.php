<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Shop_Control
{
    public $categories;
    public $products;
    public $cart_of_user;
    public $voucher_By_User;
    public $variant;
    public $cart;
    public $customer;
    public $orders;
    public $voucher_big;
    public $order_mini;
    public $comment;
    public $black;
    public function __construct()
    {
        $this->categories = new Categories_models;
        $this->voucher_By_User = new Voucher_model; // vocher của người dùng
        $this->variant = new products_variant;
        $this->products = new products();
        $this->cart = new shoping_cart(); // cart item
        $this->cart_of_user = new shoping_cart_big(); //shopping_cart
        $this->customer = new customers_models(); // khách hàng
        $this->orders = new order(); // bảng orders
        $this->voucher_big = new voucher(); // bảng voucher
        $this->order_mini = new order_detail(); // bảng chi tiết 
        $this->comment = new  comment_users();
        $this->black = new blacklist();

    }
    public function renderShop()
    {
        session_start();
        $limit = $_GET['limit'] ?? 12;
        $page = $_GET['page'] ?? 1;;
        $offset = ($page - 1) * 12;
        $price_below = 0;
        $price_above = 5000000;
        $d = $this->categories->select();
        $data_products = $this->products->render_product($price_below,$price_above,$limit,$offset);
        require_once "./views/shop.php";
    }
   
    
    public function handerContact()
    {
        require_once "./views/contact.php";
    }
    public function renderCategories() {}
    public function products_detail()
    {
       
        session_start();
        if (isset($_GET['product_id'])) {
            $id = $_GET['product_id'];
        }
        $rating = $this->comment->render_Comment($id);
        $d = $this->categories->select();
        $data_products = $this->products->render_product_by_id($id);
        $data_variants_black = $this->variant->renderVariants("đen", $id);
        $data_variants_blue = $this->variant->renderVariants("xanh", $id);
        $data_variants_red = $this->variant->renderVariants("đỏ", $id);
        $data_variants_yellow = $this->variant->renderVariants("vàng", $id);
        $data_variants_orange = $this->variant->renderVariants("cam", $id);
        if (isset($_SESSION['id'])) {
            $data_Gift = $this->voucher_By_User->select_Gift_byUserID($_SESSION['id']);
        }
        require_once "./views/detail.php";
    }
    public function Add_to_Cart()
    {
        session_start();
        $error = "";
        $id = $_GET['products_id'];
        $id_user = $_SESSION['id'] ?? 0;
        $cart_user = $this->cart_of_user->select_cart_of_user($id_user);
        $data_products = $this->products->render_product_by_id($id);
        // Kiểm tra size
        if (empty($_POST['size'])) {
            $error = "Bạn chưa chọn size!!!";
            $data_variants_black = $this->variant->renderVariants("đen", $id);
            $data_variants_blue = $this->variant->renderVariants("xanh", $id);
            $data_variants_red = $this->variant->renderVariants("đỏ", $id);
        $rating = $this->comment->render_Comment($id);

            require_once "./views/detail.php";
            return; // Dừng hàm nếu thiếu size
        }
    
        // Kiểm tra màu
        if (empty($_POST['color'])) {
            $error = "Bạn chưa chọn màu!!!";
            $this->showErrorCart($error);
            $data_variants_black = $this->variant->renderVariants("đen", $id);
            $data_variants_blue = $this->variant->renderVariants("xanh", $id);
            $data_variants_red = $this->variant->renderVariants("đỏ", $id);
        $rating = $this->comment->render_Comment($id);

            require_once "./views/detail.php";
            return; // Dừng hàm nếu thiếu màu
        }
    
        // Lấy link ảnh theo màu đã chọn
        $data_variants_img = $this->variant->renderVariants($_POST['color'], $id);
        $product_id = $data_products['product_id'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $image = ($_POST['color'] == "Trắng") ? $data_products['image'] : $data_variants_img['image'];
        $price_present = $_POST['price_present'];
        $cart_id = $cart_user['cart_id'] ?? 0;
        $check_duplicate = $this->cart->check_duplicate_cart($cart_id, $product_id, $size, $color);
    
        // Xử lý khi người dùng không đăng nhập
        if (!$id_user) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
    
            $flag = true;
            foreach ($_SESSION['cart'] as $item) {
                if ($item['color'] == $color && $item['size'] == $size && $item['name'] == $_POST['name']) {
                    $flag = false;
                    echo "<script>alert('Sản phẩm đã tồn tại trong giỏ hàng');</script>";
                    echo "<script>window.location.href = '?act=products_detail&product_id=$id';</script>";
                    return;
                }
            }
            if(!isset($_SESSION['stt'])){
                $_SESSION['stt'] = 1;
            }
            if ($flag) {
                $cart_product = [
                    "product_id" => $product_id,
                    "id" => $_SESSION['stt'],
                    "image" => $image,
                    "name" => $data_products['name'],
                    "quantity" => 1,
                    "price" => $price_present,
                    "size" => $size,
                    "color" => $color,
                ];
                $_SESSION['cart'][] = $cart_product;
                echo "<script>alert('Thêm thành công');</script>";
                echo "<script>window.location.href = '?act=products_detail&product_id=$id';</script>";
                $_SESSION['stt']++;
            }
        } elseif ($check_duplicate) {
            echo "<script>alert('Sản Phẩm Đã Tồn Tại Trong Giỏ Hàng');</script>";
            echo "<script>window.location.href = '?act=products_detail&product_id=$id';</script>";
        } elseif (empty($error)) {
            $this->cart->insert_cart_items_of_user($cart_id, $product_id, $size, $color, $image, $price_present);
            echo "<script>alert('Thêm thành công');</script>";
            echo "<script>window.location.href = '?act=products_detail&product_id=$id';</script>";
        }
    }
    

    public function renderCart()
    {
        session_start();
        $id = $_SESSION['id'] ?? 0;
        $d = $this->categories->select();
        $data_voucher = $this->voucher_By_User->select_Gift_byUserID($id);
        if(!isset($_SESSION['user'])){
            $data_cart = $_SESSION['cart'] ?? [];
        }else{
            $data_cart = $this->cart->render_cart_where_user($id);
        }
        require_once "./views/cart.php";
    }
    public function handerPay()
    {  
            //  echo "<pre>";
            // print_r($_POST);
            // die;
        session_start();
        $d = $this->categories->select();
        $id = $_SESSION['id'] ?? 0;
        $data_customer = $this->customer->renderInfo($id);
        if(isset($_SESSION['user']) && empty($data_customer)){
            echo "<script>";
            echo "alert('Vui Lòng Cập Nhật Thông Tin Để Thực Hiện Chức Năng Này');";
            echo "window.location = '?act=info';";
            echo "</script>";
        }
        if(isset($_SESSION['user']) && $data_customer['authen'] == "Chưa Xác Thực"){
            echo "<script>";
            echo "alert('Vui Lòng Xác Nhận Email Để Thực Hiện Chức Năng Này');";
            echo "window.location = '?act=info_detail';";
            echo "</script>";
        }
        // die;
        $data_cart_of_user = $this->cart->render_cart_where_user($id);
        require_once "./views/pay.php";
    }
    public function hander_update_quantity(){
        session_start();
        
        if(isset($_SESSION['user'])){
            $value = $_POST['quantity'];
        $id_user = $_SESSION['id'] ?? 0;
        $data_cart = $this->cart->render_cart_where_user($id_user);
        $id_cart_items = $_GET['cart_item_id'];
        $this->cart->update_quantity($value,$id_cart_items);
        header("location: ?act=shoping-Cart");
        }else{
            $new_quantity = $_POST['quantity'];
            $id  = $_GET['cart_item_id'];
            $guest = $_SESSION['cart'];
            foreach($guest as &$data_g){
                if($data_g['id'] == $id){
                    $data_g['quantity'] = $new_quantity;
                    break;
                }
            }
           $_SESSION['cart'] = $guest;
        }
        header("Location: ?act=shoping-Cart");
    }
   
    public function showErrorCart() {}
    public function delete_select(){
        $cart_item_id = $_GET['id_cart'];
        $this->cart->delete_item($cart_item_id);
        echo "<script>";
        echo "alert('Xóa thành công');";
        echo "window.location = '?act=shoping-Cart';";
        echo "</script>";
    }
    public function random_key_limit() {
        
        $date = date("dmy"); 
        $randomString = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5);
        $orderCode = "FPL" . $date . $randomString . "68";
        return $orderCode;
    // echo $orderCode;
}
public function dathang()
{
    session_start();
    $total = round($_POST['total'], 0);
    $name = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    $time_limit = date('Y-m-d H:i:s', strtotime('-10 seconds'));  
    $spam = $this->orders->cancel_spam_order($user_id, $time_limit);
    if ($spam['order_count'] > 1) {
       if($user_id == 0){
        $this->black->insert_list($email,$phone,$user_id);
        session_destroy();
        header("location: spam.php");
        die;  
       }else{
        $this->black->insert_list($email,$phone,$user_id);
        $this->customer->delete_info($user_id);
        $this->cart_of_user->delete_cart($user_id);
        $this->customer->delete_acc($user_id);
        session_destroy();
        header("location: spam.php");
        die;  
       }
       die;
    } else {
  
        if (!empty($_POST['voucher'])) {
            $data_voucher = $this->voucher_big->select_voucher($_POST['voucher']);
            $voucher_id = $data_voucher['voucher_id'];
        } else {
            $voucher_id = 0;
        }
        if (trim($_POST['fullname']) == "") {
            $error = "Tên người nhận không được để trống";
            require_once "./views/pay.php";
            return;
        }
        if (trim($_POST['address']) == "") {
            $error = "Địa chỉ người nhận không được để trống";
            require_once "./views/pay.php";
            return;
        }
        if (trim($_POST['phone']) == "") {
            $error = "Số điện thoại người nhận không được để trống";
            require_once "./views/pay.php";
            return;
        }
        if (trim($_POST['email']) == "") {
            $error = "Email người nhận không được để trống";
            require_once "./views/pay.php";
            return;
        }
        if ($user_id == 0) {
            $data_shoping_cart = $_SESSION['cart'];
        } else {
            $data_shoping_cart = $this->cart->render_cart_where_user($user_id);
        }
        $key_limited = $this->random_key_limit();
        $order_id = $this->orders->orders_products($user_id, $voucher_id, $total, $name, $phone, $address, $email, $key_limited);
        $_SESSION['total'] = $total;
        $_SESSION['order_id'] = $order_id;
        foreach ($data_shoping_cart as $data_cart) {
            $product_id = $data_cart['product_id'];
            $quantity = $data_cart['quantity'];
            $price = $data_cart['price'];
            $color = $data_cart['color'];
            $size = $data_cart['size'];
            $image = $data_cart['image'];
            $cart_id = $data_cart['cart_id'] ?? 0;
            $name_products = $data_cart['name'];
            
            $this->products->update_stock_quantity($quantity, $product_id);
            $this->products->update_quantity_sold($quantity, $product_id);
            $this->order_mini->insert_orders_detail($order_id, $product_id, $quantity, $price, $color, $size, $image);
            if (isset($_SESSION['user'])) {
                $this->cart->delete_cart($cart_id);
            }
            $this->voucher_By_User->deleta_Gift_after_oder_success($user_id, $voucher_id);
        }
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        $_SESSION['key'] = $key_limited;
        $_SESSION['key_time'] = time();
        header("location: ?act=vnpay");

    }
}
public function vnpay(){
    session_start();
    require_once "vnpay_php/vnpay_pay.php";
}
public function create_payment(){
   
   
    if($_POST['bankCode'] == "cod"){
       session_start();
        header("location: ?act=detail_order");
    }else{
        session_start();
        require_once "vnpay_php/vnpay_create_payment.php";
    }
}
    
public function returnUrl(){
    session_start();
    require_once "vnpay_php/vnpay_return.php";
}
public function detail_shoping(){
    session_start();
    $d = $this->categories->select();
    require_once "./views/detail_shoping.php";
}
    public function search(){
        session_start();
        $d = $this->categories->select();
        $price_below = 0;
        $price_above = 500000;
        $limit = 12;
        $offset = 0;
        $error = "";
        if(isset($_POST['key'])){
           $key =  trim(strtolower($_POST['key']));
           $key = str_replace("'", "", $key);
        }
       
        if(empty($key)){
            $error = "Vui Lòng Nhập Từ Khóa Để Tìm Kiếm VD(Áo Khoác Nam , Áo Nam ....)";
            $this->showError($error);
            return;
        }
        $data_products = $this->products->result_search($key,$price_below,$price_above,$limit,$offset);
        require_once "./views/search.php";
    }
    public function filter_by(){
        session_start();
        $where_sql = [];
        if(!empty($_POST['price'])){
            $price_sql = [];
            foreach ($_POST['price'] as $price) {
                switch ($price) {
                    case '0-50000':
                        $price_sql[] = "price BETWEEN 0 AND 50000";
                        break;
                    case '50000-150000':
                        $price_sql[] = "price BETWEEN 50000 AND 150000";
                        break;
                    case '150000-250000':
                        $price_sql[] = "price BETWEEN 150000 AND 250000";
                        break;
                    case '250000-500000':
                        $price_sql[] = "price BETWEEN 250000 AND 500000";
                        break;
                    default:
                        break;
                }
            }
            if (!empty($price_sql)) {
                $where_sql[] = '(' . implode(' OR ', $price_sql) . ')';
            }
        }
     
     if (!empty($_POST['color'])) {
        $color_sql = []; 

       
        foreach ($_POST['color'] as $color) {
            switch ($color) {
                case 'Đen':
                    $color_sql[] = "color = 'Đen'"; 
                    break;
                case 'Đỏ':
                    $color_sql[] = "color = 'Đỏ'"; 
                    break;
                case 'Xanh':
                    $color_sql[] = "color = 'Xanh'"; 
                    break;
                    case 'Vàng':
                        $color_sql[] = "color = 'Vàng'"; 
                        break;
                    case 'Cam':
                        $color_sql[] = "color = 'Cam'"; 
                        break;
                default:
                    break;
            }
        }

       
        if (!empty($color_sql)) {
            $where_sql[] = '(' . implode(' OR ', $color_sql) . ')';
        }
    }
    if (!empty($_POST['size'])) {
        $size_sql = []; 

        foreach ($_POST['size'] as $size) {
            switch ($size) {
                case 'S':
                    $size_sql[] = "size = 'S'"; 
                    break;
                case 'M':
                    $size_sql[] = "size = 'M'"; 
                    break;
                case 'L':
                    $size_sql[] = "size = 'L'"; 
                    break;
                case 'XL':
                    $size_sql[] = "size = 'XL'"; 
                    break;
                default:
                    break;
            }
        }

        if (!empty($size_sql)) {
            $where_sql[] = '(' . implode(' OR ', $size_sql) . ')';
        }
    }
    $where = "";
    if (!empty($where_sql)) {
        $where .= " WHERE " . implode(' AND ', $where_sql);
    }
   
    $data_products = $this->products->filter($where);
   require_once "./filter/filter_by_price.php";
    }
    public function post_comment() {
        session_start();
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['id'];
        }
        if(!isset($_SESSION['user'])){
            header("location: ?act=login");
            return;
        }
        $data_customer = $this->customer->renderInfo($user_id);
        if(!$data_customer){
            echo "<script>alert('Vui Lòng Cập Nhật Thông Tin');</script>";
            echo "<script>window.location.href = '?act=info';</script>";
            exit;
        }
        $products_id = $_GET['products_id'];
        if (!isset($_SESSION['user'])) {
            header("location: ?act=login");
            exit;
        }
        $index = trim($_POST['index']);
        if (empty($index)) {
            $_SESSION['error_cm'] = "Vui lòng nhập nhận xét của bạn";
            $_SESSION['error_cm_time'] = time(); // Lưu thời gian lỗi xảy ra
            header("location:?act=products_detail&product_id=$products_id");
            exit;
        }
        if (!empty($index)) {
            $index_bad = ['dmm', 'dm', 'lol', 'cm', 'mẹ', 'mày', 'tao', 'đéo', 'd m'];
            foreach ($index_bad as $bad) {
                $index = str_replace($bad, "***", $index);
            }
    
            
            $check = $this->comment->checkduplicate($user_id,$products_id);
            if ($check) {
                $_SESSION['error_cm'] = "Bạn đã nhận xét cho sản phẩm này";
                $_SESSION['error_cm_time'] = time(); 
                header("location:?act=products_detail&product_id=$products_id");
                exit;
            }
            $this->comment->create_comment($user_id, $products_id, $index);
            header("location:?act=products_detail&product_id=$products_id");
            exit;
        }
    }
    public function search_s(){
        if(isset($_GET['s'])){
            $key = $_GET['s'];
        }
        $d = $this->categories->select();
        $data_products = $this->products->search_by_cate($key);
        require_once "./views/s.php";
    }
    public function select_history_order(){
        if(isset($_POST['key'])){
            $key_limited = $_POST['key'];
        $data_key = $this->orders->select_by_key($key_limited);
        $data_prd = $this->orders->select_by_key_get_prd($key_limited);
        }
        require_once "customers/detail_select.php";
    }
    public function showError($error){
        require_once "./views/search.php";
    }
    public function check_stock(){
      
        if ($_GET['act'] === 'check_stock') {
            $size = $_POST['size'];
            $color = $_POST['color'];
            $product_id = $_GET['products_id'];
            if($color != "Trắng"){
                $stock_quantity = $this->variant->select_color_size($size,$color,$product_id);
            }else{
                $sum = $this->products->render_product_by_id($product_id);
                $sum_variant = $this->variant->sum_variant($product_id);
                $stock_quantity['stock_quantity'] = ($sum['stock_quantity'] - $sum_variant['tong']);
            }
            if($stock_quantity > 0){
                echo "Còn ". $stock_quantity['stock_quantity']. " Sản Phẩm";
            }else{
                echo "Tạm Hết Hàng";
            }      
           
        
        }
        

    }
}
$shop = new Shop_Control;
