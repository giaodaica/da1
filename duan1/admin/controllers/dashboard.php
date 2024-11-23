<?php
class admin_controllers {
    public function __construct()
    {
            
    }
    public function home_Admin(){
       require_once "./views/home.php";
    }
    public function logout(){
        session_start();
        session_destroy();
        header("location: ".BASE_URL);
    }
    public function check(){
        session_start();
        if(!isset($_SESSION['role_admin'])){
            header("location: error.php");
        }
    }
    
}
$admin = new admin_controllers();