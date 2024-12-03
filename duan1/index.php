<?php
require_once "core/core.php";

?>

<?php



$act = $_GET['act'] ?? "home";
match($act){
    'home' => $app->home(),
    'register' =>$users->handerViewRegister(),
    'login' => $users->handerViewLogin(),
    'post_register' => $users->post_Register(),
    'check_login' => $users->login(),
    'logout' => $users->logout(),
    'admin'=> $app->admin(),
    // Giao diện shop
    'shop' => $shop->renderShop(),
    'shoping-Cart' => $shop->renderCart(),
    'shop-Pay' => $shop->handerPay(),
    'shop-Contact' => $shop->handerContact(),
    'post_comment' => $shop->post_comment(),
    'add_cp' => $shop->add_cp(),
    // phần khách hàng
    'info' => $customers->renderInfo(),
    'info_detail' =>$customers->render_Infodetail(),
    'insert_Info' =>$customers->hander_insert_info(),
    'update_Info' => $customers->hander_update_info(),
    'history_shop' => $customers->history_shop(),
    'detail' => $customers->detail_shoping_cart(),
    'cancel_shoping' => $customers->cancel_shoping(),
    'send-otp' => $customers->sendOtp(),
    'confirm_email' => $customers->confirm_email(),
    'action_history' => $customers->action_history(),
    'change_password' => $customers->change_password(),
    'post_change' => $customers->post_change(),
    'forgot_password' => $customers->forgot_password(),

    // phần sản phẩm
    'products_detail' => $shop->products_detail(),
    'add-to-cart' => $shop->Add_to_Cart(),
    'update_quantity' => $shop->hander_update_quantity(),
    'apply_voucher' => $shop->apply_voucher(),
    'dathang' => $shop->dathang(),
    'delete_item_cart' => $shop->delete_select(),
    'search' => $shop->search(),
    's' => $shop -> search_s(),
    'filter_by' => $shop->filter_by(),
    'select_history_order'=> $shop->select_history_order(),
    'post_select_htr' => $shop->post_select_htr(),
    'detail_order' => $shop->detail_shoping(),
    'vnpay' => $shop->vnpay(),
    'create_payment' => $shop->create_payment(),
    'returnUrl' => $shop->returnUrl(),
    'check_stock'=>$shop->check_stock(),
    'fill_products' => $shop->fill_products(),
    'delete_rating' => $shop->delete_rating(),
    default => "Vui Lòng Kiểm Tra lại"
};

