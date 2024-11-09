<?php
class Shop_Control {
    public $categories;
    public $products;
    public $voucher_By_User;
    public $variant;
    public function __construct()
    {
     $this->categories = new Categories_models;   
     $this->voucher_By_User = new Voucher_model;
     $this->variant = new products_variant;
     $this->products = new products();
    }
    public function renderShop(){
        require_once "./views/shop.php";
    }
    public function renderCart(){
        require_once "./views/cart.php";
    }
    public function handerPay(){
        require_once "./views/pay.php";
    }
    public function handerContact(){
        require_once "./views/contact.php";
    }
    public function renderCategories(){

    }
    public function products_detail(){
        session_start();
        if(isset($_GET['product_id'])){
            $id = $_GET['product_id'];
        }
        $d = $this->categories->select();
        $data_products = $this->products->render_product_by_id($id);
        $data_variants_black = $this->variant->renderVariants("black",$id);
        $data_variants_blue = $this->variant->renderVariants("blue",$id);
        $data_variants_red = $this->variant->renderVariants("red",$id);

        if(isset($_SESSION['id'])){
            $data_Gift = $this->voucher_By_User->select_Gift_byUserID($_SESSION['id']);
         }
        require_once "./views/detail.php";
    }
}
$shop = new Shop_Control;