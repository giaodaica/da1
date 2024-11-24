<?php
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
    }
    public function renderShop()
    {
        $limit = $_GET['limit'] ?? 12;
        $page = $_GET['page'] ?? 1;;
        $offset = ($page - 1) * 12;
        $data_products = $this->products->render_product($limit,$offset);
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
                    "products_id" => $product_id,
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
        $id = $_SESSION['id'] ?? 0;
        $data_customer = $this->customer->renderInfo($id);
        if(empty($data_customer)){
            echo "<script>";
            echo "alert('Vui Lòng Cập Nhật Thông Tin Để Thực Hiện Chức Năng Này');";
            echo "window.location = '?act=info';";
            echo "</script>";
        }
        if($data_customer['authen'] == "Chưa Xác Thực"){
            echo "<script>";
            echo "alert('Vui Lòng Xác Nhận Số Điện Thoại Để Thực Hiện Chức Năng Này');";
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
    public function dathang()
    {
        session_start();
        
        // print_r($_POST);
        // die;

        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
        
       
       
        if(!empty($_POST['voucher'])){
            $data_voucher = $this->voucher_big->select_voucher($_POST['voucher']);
            $voucher_id = $data_voucher['voucher_id'];
        }else{
            $voucher_id = 0;
        }
        if(trim($_POST['fullname']) == ""){
            $error = "Tên người nhận không được để trống";
            require_once "./views/pay.php";
            return;
        }
        if(trim($_POST['address']) == ""){
            $error = "Địa chỉ người nhận không được để trống";
            require_once "./views/pay.php";
            return;
        }  if(trim($_POST['phone']) == ""){
            $error = "Số điện thoại người nhận không được để trống";
            require_once "./views/pay.php";
            return;
        }
       
        $total = round($_POST['total'],0);
        $name = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $order_id = $this->orders->orders_products($user_id,$voucher_id,$total,$name,$phone,$address);
        $data_shoping_cart =  $this->cart->render_cart_where_user($user_id);
        foreach($data_shoping_cart as $data_cart){
            $product_id = $data_cart['product_id'];
            $quantity = $data_cart['quantity'];
            $price = $data_cart['price'];
            $color = $data_cart['color'];
            $size = $data_cart['size'];
            $image = $data_cart['image'];
            $cart_id = $data_cart['cart_id'];
        $this->order_mini->insert_orders_detail($order_id,$product_id,$quantity,$price,$color,$size,$image);
        $this->cart->delete_cart($cart_id);
        $this->voucher_By_User->deleta_Gift_after_oder_success($user_id,$voucher_id);
        }
        if(isset($_SESSION['cart'])){
          unset($_SESSION['cart']);
            echo "<script>alert('Đặt hàng thành công');</script>";
        echo "<script>window.location.href = '" . BASE_URL . "';</script>";
        }
        echo "<script>alert('Đặt hàng thành công');</script>";
        echo "<script>window.location.href = '" . BASE_URL . "';</script>";
    }
}
$shop = new Shop_Control;
