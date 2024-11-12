<?php
class admin_controllers {
<<<<<<< HEAD
    public $sanPham;
    public $danhMuc;
    public function __construct()
    {
        $this-> sanPham = new sanpham();
        $this-> danhMuc = new danhmuc();
=======
    public $sanpham1;
    public $danhmuc1;
    public function __construct()
    {
            $this->sanpham1 = new sanpham();
            $this->danhmuc1 = new danhmuc();
>>>>>>> 9f404fb9d90bd9af140c13eb16d9fdb68fa06322
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
<<<<<<< HEAD
    public function list_products(){
        $data = $this->sanPham->list_product();
        require_once "./views/list_product.php";
    }
    public function add_products(){
        $data_danhmuc= $this->danhMuc->list_categorie();
        require_once "./views/add_product.php";
    }
    public function post_products(){
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $stock_quantity = $_POST['stock_quantity'];
        $status = $_POST['status'];
        $image = "./uploads" ."/". $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
            $this->sanPham->add_product( $name, $category_id, $price, $stock_quantity, $status, $image);
            echo "<script>";
            echo"alert('Thêm mới thành công');";
            echo "window.location.href = '?act=list_product';";
            echo"</script>";
    }
    public function delete_products(){
    $product_id = $_GET['product_id'];
    if ($product_id) {
        $this->sanPham->delete_product($product_id);
        echo "<script>";
        echo "alert('Xóa thành công');";
        echo "window.location.href = '?act=list_product';";
        echo "</script>";
    } else {
        echo "<script>alert('ID sản phẩm không hợp lệ');</script>";
    }
}   

    
=======
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
>>>>>>> 9f404fb9d90bd9af140c13eb16d9fdb68fa06322
}
$admin = new admin_controllers();