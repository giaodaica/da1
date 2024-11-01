<?php
class controller_Customers{
    public function renderInfo(){
        require_once "customers/info.php";
    }
}
$customers = new controller_Customers;