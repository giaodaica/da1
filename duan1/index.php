<?php
require_once "core/core.php"
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
};
