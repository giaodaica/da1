<?php
class admin_controllers {
    public $order;
    public $products;
    public function __construct()
    {
            $this->order = new order();
            $this->products = new product;
    }
    public function home_Admin(){
        
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
       
      if(isset($_GET['act'])){
        $post_date_after = $_POST['time_after'];
        $post_date_before = $_POST['time_before'];
        $date_after =  $post_date_after;
        $date_before = $post_date_before;
        $data_sum = $this->order->sum_revenue($date_after,$date_before);
        $data_order = $this->order->sum_order($date_after,$date_before);
        $profit = $this->order->profit($date_after,$date_before);
         require_once "./views/home.php";
      }else{
        $date_after = '2024-01-01 00:00:00';
        $date_before = date("Y-m-d H:i:s");
        $data_sum = $this->order->sum_revenue($date_after,$date_before);
        $data_order = $this->order->sum_order($date_after,$date_before);
        $profit = $this->order->profit($date_after,$date_before);
         require_once "./views/home.php";
      }
     
       
    }
    public function logout(){
        session_start();
        session_destroy();
        header("location: ".BASE_URL);
    }
    public function check(){
        session_start();
        if(!isset($_SESSION['role_admin'])){
            header("location: error.php");
        }
    }
    
    
}
$admin = new admin_controllers();