<?php
class Shop_Control
{
    public $categories;
    public $products;
    public $cart_of_user;
    public $voucher_By_User;
    public $variant;
    public $cart;
    public function __construct()
    {
        $this->categories = new Categories_models;
        $this->voucher_By_User = new Voucher_model;
        $this->variant = new products_variant;
        $this->products = new products();
        $this->cart = new shoping_cart();
        $this->cart_of_user = new shoping_cart_big();
    }
    public function renderShop()
    {
        require_once "./views/shop.php";
    }
   
    public function handerPay()
    {
        require_once "./views/pay.php";
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
        if (empty($_POST['size'])) {
            $error = "Bạn chưa chọn size!!!";
            $data_variants_black = $this->variant->renderVariants("đen", $id);
            $data_variants_blue = $this->variant->renderVariants("xanh", $id);
            $data_variants_red = $this->variant->renderVariants("đỏ", $id);
            require_once "./views/detail.php";
        }
        if (empty($_POST['color'])) {
            $error = "Bạn chưa chọn màu!!!";
            $this->showErrorCart($error);
            $data_variants_black = $this->variant->renderVariants("đen", $id);
            $data_variants_blue = $this->variant->renderVariants("xanh", $id);
            $data_variants_red = $this->variant->renderVariants("đỏ", $id);
            require_once "./views/detail.php";
        }
        // lấy link ảnh
       if(isset($_POST['color'])){
        $data_variants_img = $this->variant->renderVariants($_POST['color'], $id);
       }
        $product_id = $data_products['product_id'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        if($_POST['color'] == "Trắng"){
            $image = $data_products['image'];
        }else{
            $image = $data_variants_img['image'];
        }
        $price_present = $_POST['price_present'];
        $cart_id = $cart_user['cart_id'] ?? 0;
        $check_duplicate = $this->cart->check_duplicate_cart($cart_id, $product_id, $size, $color); 
        if(!$id_user){
                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart'] = [];
                }
                $flag = true; 
                foreach ($_SESSION['cart'] as $item) {
                    if ($item['color'] == $_POST['color'] && $item['size'] == $_POST['size'] && $item['name'] == $_POST['name']) {
                        $flag = false; 
                        echo "<script>";
                        echo "alert('Sản phẩm đã tồn tại trong giỏ hàng');";
                        echo "window.location.href = '?act=products_detail&product_id=$id';";
                        echo "</script>";
                        break;
                    }
                }
                if ($flag) {
                    $cart_product = [
                        "image" => $data_products['image'],
                        "name" => $data_products['name'],
                        "quantity" => 1,
                        "price" => $_POST['price_present'],
                        "size" => $_POST['size'],
                        "color" => $_POST['color'],
                    ];
                    $_SESSION['cart'][] = $cart_product;
                    echo "<script>";
                    echo "alert('Thêm thành công');";
                    echo "window.location.href = '?act=products_detail&product_id=$id';";
                    echo "</script>";
                }
        }else if($check_duplicate){
            echo "<script>";
            echo "alert('Sản Phẩm Đã Tồn Tại Trong Giỏ Hàng');";
            echo "window.location.href = '?act=products_detail&product_id=$id';";
            echo "</script>";
        }
        elseif (empty($error)){
   $this->cart->insert_cart_items_of_user($cart_id, $product_id, $size, $color,$image,$price_present);
            echo "<script>";
            echo "alert('Thêm thành công');";
            echo "window.location.href = '?act=products_detail&product_id=$id';";
            echo "</script>";
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
    public function showErrorCart() {}
    public function checkquan()
    {

        print_r($_POST);
    }
}
$shop = new Shop_Control;
