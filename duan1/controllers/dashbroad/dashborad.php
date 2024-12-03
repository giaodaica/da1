<?php
 class app{
    public $prod;
    public $categories;
    public $voucher_By_User;
    public $voucher;
    public function __construct(){
        $this->categories = new Categories_models;
        $this->voucher_By_User = new Voucher_model;
        $this->prod = new products;
        $this->voucher = new voucher;
        // $this->cart = new 
    }
    public function home(){
        session_start();
         $d = $this->categories->select_giao();
         $products = $this->prod->select_by16();
        //  $shoping_Cart = $this->
         if(isset($_SESSION['id'])){
            $data_Gift = $this->voucher_By_User->select_Gift_byUserID($_SESSION['id']);
         }
         $data_voucher = $this->voucher->select_byID();
        require_once "./views/home.php";
    }
    public function error404(){
        require_once "error.php";
    }
    public function admin(){
        session_start();
        header("location: ./admin");
    }
 }

$app = new app;
