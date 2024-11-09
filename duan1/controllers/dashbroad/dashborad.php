<?php
 class app{
    public $prod;
    public $categories;
    public $voucher_By_User;
    public function __construct(){
        $this->categories = new Categories_models;
        $this->voucher_By_User = new Voucher_model;
        $this->prod = new products;
    }
    public function home(){
        session_start();
         $d = $this->categories->select();
         $products = $this->prod->select();
         if(isset($_SESSION['id'])){
            $data_Gift = $this->voucher_By_User->select_Gift_byUserID($_SESSION['id']);
         }
        require_once "./views/home.php";
    }
    public function admin(){
        session_start();
        header("location: admin");
    }
 }

$app = new app;
