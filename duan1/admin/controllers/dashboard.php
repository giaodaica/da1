<?php
class admin_controllers {
    public $sanpham1;
    public $danhmuc1;
    public function __construct()
    {
            $this->sanpham1 = new sanpham();
            $this->danhmuc1 = new danhmuc();
    }
    public function home_Admin(){
       require_once "./views/home.php";
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
    public function hienthisanpham(){
        $data = $this->sanpham1->hienthisanpham();
        require_once "./views/hienthisanpham.php";
    }
    public function add_products(){
        $data_danhmuc = $this->danhmuc1->hienthidanhmuc();
        require_once "./views/themsanpham.php";
    }
    public function post_sanpham(){
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $quantity_sold = $_POST['quantity_sold'];
            $image = "./uploads" ."/". $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
            $mota = $_POST['status'];
         $this->sanpham1->add_product($name,$category_id,$price,$image,$quantity_sold,$mota);
      echo  "<script>";
        echo "alert('them thanh cong');";
        echo "window.location.href = '?act=hienthisanpham';";
        echo "</script>";

    }
}
$admin = new admin_controllers();