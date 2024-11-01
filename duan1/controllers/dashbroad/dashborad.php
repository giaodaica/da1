<?php
 class app{
    public $categories;
    public $voucher_By_User;
    public function __construct(){
        $this->categories = new Categories_models;
        $this->voucher_By_User = new Voucher_model;
    }
    public function home(){
        session_start();
         $d = $this->categories->select();
         if(isset($_SESSION['id'])){
            $data_Gift = $this->voucher_By_User->select_Gift_byUserID($_SESSION['id']);
         }
        require_once "./views/home.php";
    }
    public function admin(){
        header("location: admin");
    }
 }

$app = new app;
