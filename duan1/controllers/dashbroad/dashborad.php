<?php
 class app{
    public function home(){
        require_once "./views/home.php";
    }
    public function admin(){
        header("location: admin");
    }
 }

$app = new app;
