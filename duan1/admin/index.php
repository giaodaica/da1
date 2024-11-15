<?php
require_once "./models/products.php";
require_once "./models/categories.php";



require_once "core.php";
require_once "../commons/env.php";

//controller sản phẩm
require_once "./controllers/products.php";

$admin->check();

$act = $_GET['act'] ?? "home";
match($act){
    'home' => $admin->home_Admin(),
    'logout' => $admin->logout(),   
    'add_product'=> $admin ->add_products(),
    'list_product'=> $admin ->list_products(),
    'post_product' => $admin->post_products(),
    'delete_product' => $admin->delete_products(),
    
    'view_update_product' => $admin->view_update_product(),
    'update_product' => $admin->update_products(),


    'logout' => $admin->logout(),
    'add_products' => $admin->add_products(),
    'post_products' => $admin->post_sanpham()

};