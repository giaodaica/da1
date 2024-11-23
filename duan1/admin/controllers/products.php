<?php

class products {
    public $product;
    public $category;
    public function __construct()
    {
        $this->category = new categories();
        $this->product = new product();
    }
    public function render_list_products(){
        $limit = 5;
        if(isset($_GET['comment']) && $_GET['comment'] == "presently"){
            $comment = 1;
        }else{
            $comment = 0;
        }
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 5;
        $data_products = $this->product->render_prd($comment,$limit,$offset);
        require_once "./products/list_products.php";
    }
    public function delete_products(){
        
        if(isset($_SESSION['role_admin'])){
            $id = $_GET['products_id'];
            $this->product->delete_prd($id);
           echo "<script>";
            echo "alert('Xóa thành công');";
            echo "window.location = '?act=render_list_products&comment=presently';";
            echo "</script>";
        }
    }
    public function presently(){
        if(isset($_SESSION['role_admin'])){
            $id = $_GET['products_id'];
            $this->product->presently($id);
           echo "<script>";
            echo "alert('Sửa thành công');";
            echo "window.location = '?act=render_list_products&comment=hidden';";
            echo "</script>";
        }
    }
    public function add_products(){
       $data_category =  $this->category->render_categories();
        require_once "products/add_products.php";
    }
    public function post_products(){
        if(isset($_SESSION['role_admin'])){
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $gianhap = $_POST['gianhap'];
            $stock_quantity = $_POST['stock_quantity'];
            $status = $_POST['status'];
            $comment = $_POST['comment'];
            $Quantity_sold = $_POST['Quantity_sold'];
            $mota = $_POST['mota'];
            $image = "./uploads" ."/". $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
            $this->product->add_products($name,$category_id,$price,$gianhap,$stock_quantity,$status,$comment,$image,$Quantity_sold,$mota);
            echo "<script>";
            echo "alert('Thêm Thành Công');";
            echo "window.location = '?act=render_list_products&comment=presently';";
            echo "</script>";
        }
    }
    public function update_products(){
        $products_id = $_GET['products_id'] ?? 0;
       $data_category =  $this->category->render_categories();
        $data_by_id = $this->product->select_products_by_id($products_id);
        require_once "./products/update_products.php";
    }
    public function post_update_products(){
        $products_id = $_GET['products_id'] ?? 0;
        $info_products = $this->product->select_products_by_id($products_id);
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $gianhap = $_POST['gianhap'];
        $stock_quantity = $_POST['stock_quantity'];
        $status = $_POST['status'];
        $comment = $_POST['comment'];
        $Quantity_sold = $_POST['Quantity_sold'];
        $mota = $_POST['mota'];
        $image_1 = $info_products['image'];
        if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image = "./uploads" . "/" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image); // Di chuyển file ảnh vào thư mục uploads
          } else {
           $image = $image_1;
          } //
        $this->product->update_products($name,$category_id,$price,$gianhap,$stock_quantity,$status,$comment,$image,$Quantity_sold,$mota,$products_id);
        echo "<script>";
        echo "alert('Sửa Thành Công');";
        echo "window.location = '?act=render_list_products&comment=presently';";
        echo "</script>";
    }
}
$products = new products();