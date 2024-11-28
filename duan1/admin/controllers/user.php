<?php

class user {
    public $userModel;
    public $orders;
    
    public function __construct()
    {
        $this->userModel = new User_Model();
        $this->orders = new order();
        
    }
    public function render_List_User(){
        $user = $this->userModel->get_All_Users();
        require_once "user/list_users.php";
    }
    public function renderHistory_order(){
        if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
        }
        $data_order = $this->orders->render_order_by_user($user_id);
        require_once "./user/history_order.php";
    }
    
   
}
$user = new user();
