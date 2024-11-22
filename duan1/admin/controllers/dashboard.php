<?php
class admin_controllers
{
    public $sanPham;
    public $danhMuc;
    public $sanpham1;
    public $danhmuc1;
    public function __construct()
    {
        $this->sanPham = new sanpham();
        $this->danhMuc = new danhmuc();

        $this->sanpham1 = new sanpham();
        $this->danhmuc1 = new danhmuc();
    }
    public function home_Admin()
    {
        require_once "./views/home.php";
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header("location: " . BASE_URL);
    }
    public function check()
    {
        session_start();
        if (!isset($_SESSION['role_admin'])) {
            header("location: error.php");
        }
    }

    public function list_products()
    {
        $data = $this->sanPham->list_products();
        require_once "./views/list_product.php";
    }
    public function add_products()
    {
        $data_danhmuc = $this->danhMuc->list_categorie();
        require_once "./views/add_product.php";
    }
    public function post_products()
    {
        $name = $_POST['name'] ?? '';
        $category_id = $_POST['category_id'] ?? '';
        $price = $_POST['price'] ?? '';
        $stock_quantity = $_POST['stock_quantity'] ?? '';
        $status = $_POST['status'] ?? '';
        $image = "./uploads/" . ($_FILES['image']['name'] ?? '');
        // Kiểm tra nếu có trường nào chưa được điền
        if (empty($name)) {
            echo "<script>alert('Vui lòng nhập tên sản phẩm.'); window.location.href = '?act=add_product';</script>";
        }
        if (!is_numeric($category_id) || $category_id == '') {
            echo "<script>alert('Vui lòng chọn một danh mục hợp lệ.'); window.location.href = '?act=add_product';</script>";
            return;
        }
        if (empty($price) || !is_numeric($price) || $price <= 0) {
            echo "<script>alert('Vui lòng nhập giá sản phẩm và giá phải lớn hơn 0.'); window.location.href = '?act=add_product';</script>";
            return;
        }
        if (empty($stock_quantity) || !is_numeric($stock_quantity) || $stock_quantity < 0) {
            echo "<script>alert('Vui lòng nhập số lượng sản phẩm và số lượng phải lớn hơn 0.'); window.location.href = '?act=add_product';</script>";
            return;
        }
        if (empty($status)) {
            echo "<script>alert('Vui lòng chọn trạng thái sản phẩm.'); window.location.href = '?act=add_product';</script>";
            return;
        }
        if (empty($image)) {
            echo "<script>alert('Vui lòng chọn ảnh sản phẩm.'); window.location.href = '?act=add_product';</script>";
            return;
        }
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        $this->sanPham->add_product($name, $category_id, $price, $stock_quantity, $status, $image);
        echo "<script>alert('Thêm mới thành công'); window.location.href = '?act=list_product';</script>";
    }
    public function delete_products()
    {
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
    public function post_sanpham()
    {
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $quantity_sold = $_POST['quantity_sold'];
        $image = "./uploads" . "/" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        $mota = $_POST['status'];
        $this->sanpham1->add_product($name, $category_id, $price, $image, $quantity_sold, $mota);
        echo  "<script>";
        echo "alert('them thanh cong');";
        echo "window.location.href = '?act=list_product';";
        echo "</script>";
    }
    public function view_update_product()
    {
        $product_id = $_GET['product_id'];
        $data = $this->sanPham->select_products($product_id);
        $category = $this->danhMuc->list_categorie();
        // print_r($category);
        // print_r($data);
        // die;
        require_once "views/update_product.php";
    }
    public function update_products()
    {
        $product_id = $_POST['product_id'];
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $stock_quantity = $_POST['stock_quantity'];
        $status = $_POST['status'];

        $info_products = $this->sanPham->find_one($product_id);
        $image_1 = $info_products['image'];

        if (!empty($_FILES['image']['name'])) {
            $image = "./uploads/" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        } else {
            $image = $image_1;
        }
        $this->sanPham->update_product($product_id, $name, $category_id, $price, $stock_quantity, $status, $image);
        echo "<script>";
        echo "alert('Cập nhật thành công');";
        echo "window.location.href = '?act=list_product';";
        echo "</script>";
    }
}
$admin = new admin_controllers();
