<?php
class admin_controllers {
    public $sanPham;
    public $danhMuc;
    public function __construct()
    {
        $this-> sanPham = new sanpham();
        $this-> danhMuc = new danhmuc();
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

    
}
$admin = new admin_controllers();