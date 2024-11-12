<?php
<<<<<<< HEAD
require_once "./models/products.php";
require_once "./models/categories.php";
=======
require_once "./models/sanpham.php";
require_once "./models/danhmuc.php";
>>>>>>> 9f404fb9d90bd9af140c13eb16d9fdb68fa06322

require_once "core.php";
require_once "../commons/env.php";

//controller sản phẩm
require_once "./controllers/products.php";

$admin->check();

$act = $_GET['act'] ?? "home";
match($act){
    'home' => $admin->home_Admin(),
<<<<<<< HEAD
    'logout' => $admin->logout(),   
    'add_product'=> $admin ->add_products(),
    'list_product'=> $admin ->list_products(),
    'post_product' => $admin->post_products(),
    'delete_product' => $admin->delete_products(),
    'update_product' =>$admin->update_products(),
=======
    'logout' => $admin->logout(),
    'hienthisanpham' =>$admin->hienthisanpham(),
    'add_products' => $admin->add_products(),
    'post_products' => $admin->post_sanpham()
>>>>>>> 9f404fb9d90bd9af140c13eb16d9fdb68fa06322
};