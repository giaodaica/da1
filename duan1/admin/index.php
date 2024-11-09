<?php
require_once "core.php";
require_once "../commons/env.php";
$admin->check();

$act = $_GET['act'] ?? "home";
match($act){
    'home' => $admin->home_Admin(),
    'logout' => $admin->logout(),
};