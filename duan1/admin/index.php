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
    'render_list_variant' => $products ->render_list_variant(),
    'update_variant' => $products->update_variant(),
    'post_update_variant' => $products->post_update_variant(),
    'add_variant' => $products->add_variant(),
    'post_insert_variant' => $products->post_insert_variant(),
    'hidden_variant' => $products->hidden_variant(),
    // phần danh mục 
    'list_category' => $category->render_List_Category(),
    
};