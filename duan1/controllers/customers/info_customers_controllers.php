<?php
class controller_Customers{
    public $gift;
    public $info;
    public function __construct()
    {
        $this->info = new customers_models();
        $this->gift = new Voucher_model();
    }
    public function renderInfo(){
        session_start();
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $data_Custm = $this->info->renderInfo($id);
        }
         if(isset($_SESSION['id'])){
            $data_Gift = $this->gift->select_Gift_byUserID($_SESSION['id']);
         }
        require_once "customers/info.php";
    }
}
$customers = new controller_Customers;