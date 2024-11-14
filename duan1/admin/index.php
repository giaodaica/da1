<?php
require_once "./models/sanpham.php";
require_once "./models/danhmuc.php";

require_once "core.php";
require_once "../commons/env.php";
$admin->check();

$act = $_GET['act'] ?? "home";
match($act){
    'home' => $admin->home_Admin(),
    'logout' => $admin->logout(),
    // 'hienthisanpham' =>$admin->hienthisanpham(),
    // 'add_products' => $admin->add_products(),
    // 'post_products' => $admin->post_sanpham()
};