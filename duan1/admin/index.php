<?php
require_once "./models/app.php";
require_once "./controllers/app.php";
require_once "../commons/env.php";
$admin->check();

$act = $_GET['act'] ?? "home";
match($act){
    'home' => $admin->home_Admin(),
    'logout' => $admin->logout(),
    // phần của products
    'render_list_products' =>$products->render_list_products(),
    'delete_products' =>$products->delete_products(),
    'render_list_products_hidden' => $products->render_list_products_hidden(),
    'presently' => $products->presently(),
    'new_products' => $products->add_products(),
    'update_products' => $products->update_products(),
    'post_products' => $products->post_products(),
    'update_products'=> $products->update_products(),
    'post_update_products' => $products->post_update_products(),
    
};