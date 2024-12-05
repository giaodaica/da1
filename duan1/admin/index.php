<?php
require_once "./models/app.php";
require_once "./controllers/app.php";
require_once "../commons/env.php";
$admin->check();

$act = $_GET['act'] ?? "home";
match ($act) {
    'home' => $admin->home_Admin(),
    'logout' => $admin->logout(),
    // phần của products
    'render_list_products' => $products->render_list_products(),
    'delete_products' => $products->delete_products(),
    'render_list_products_hidden' => $products->render_list_products_hidden(),
    'presently' => $products->presently(),
    'new_products' => $products->add_products(),
    'update_products' => $products->update_products(),
    'post_products' => $products->post_products(),
    'update_products' => $products->update_products(),
    'post_update_products' => $products->post_update_products(),
    'render_list_variant' => $products->render_list_variant(),
    'update_variant' => $products->update_variant(),
    'post_update_variant' => $products->post_update_variant(),
    'add_variant' => $products->add_variant(),
    'post_insert_variant' => $products->post_insert_variant(),
    'hidden_variant' => $products->hidden_variant(),
    'list_comment' => $products->list_comment(),
    // phần danh mục 
    'list_category' => $category->render_List_Category(),
    'delete_category' => $category->delete_Category(),
    'add_category' => $category->render_Add_Category(),
    'post_add_category' => $category->Add_Category(),
    'update_category' => $category->render_Update_Category(),
    'post_update_category' => $category->Update_Category(),
    'category_an' => $category->category_an(),
    'presently_category' => $category->presently_category(),
    // phần user
    'list_users' => $user->render_List_User(),
    'history_shop' => $user->renderHistory_order(),
    // phần order
    'list_orders'=> $Order->render_List_Order(),
    'update_order_status' => $Order->updateOrderStatus(),
    'confirm' => $Order->confirm_order(),
    'delivery' => $Order->delivery(),
    'detail_order' => $Order->render_detail_shoping_cart(),
    'update_info' => $Order->update_info(),
    'post_update' => $Order->post_update(),
    'revenue' => $admin ->home_Admin(),
    // doanh thu 
    // voucher
    'list_voucher'=> $products->list_voucher(),
    'add_voucher' => $products->add_voucher(),
    'post_insert_voucher'=>$products->post_insert_voucher(),
        'update_voucher'=> $products->update_voucher(),
        'post_update_voucher' => $products->post_update_voucher(),



};
