<?php
class Shop_Control {
    public function __construct()
    {
        
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

}
$shop = new Shop_Control;