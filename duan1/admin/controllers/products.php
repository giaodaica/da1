<?php

class products {
    public $product;
    public $category;
    public $variant;
    public $comment;
    public $voucher;
    public function __construct()
    {
        $this->category = new categories();
        $this->product = new product();
        $this->variant = new variant_products();
        $this->comment = new comments();
        $this->voucher = new voucher;
    }   
    public function render_list_products(){
        $limit = 5;
        if(isset($_GET['comment']) && $_GET['comment'] == "presently"){
            $comment = 1;
        }else{
            $comment = 0;
        }
        if(isset($_GET['category_id'])){
            $limit = 50;
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
          $error = "";

            $name = trim($_POST['name']);
            $category_id = $_POST['category_id'];
            $price = trim($_POST['price']);
            $gianhap = trim($_POST['gianhap']);
            $stock_quantity = trim($_POST['stock_quantity']);
            $status = $_POST['status'];
            $comment = $_POST['comment'];
            $Quantity_sold = trim($_POST['Quantity_sold']);
            $mota = $_POST['mota'];
            $image = "./uploads" ."/". $_FILES['image']['name'];
            $data_prd = $this->product->select_where_products_name($name);
            if($data_prd){
                $error = "Tên Sản Phẩm Bị Trùng Vui Lòng Kiểm Tra Lại";
                $this->showError($error);
                return;
            }
            if(empty($name)){
                $error = "Tên sản phẩm không được để trống";
                $this->showError($error);
                return;
            }
            if($price < 0 ){
                $error = "Giá bán không thể là 1 số âm và không được để trống";
                $this->showError($error);
                return;
            }  if($gianhap < 0 ){
                $error = "Giá nhập không thể là 1 số âm và không được để trống";
                $this->showError($error);
                return;
            }
            if($stock_quantity < 0 ){
                $error = "Số lượng nhập không thể là 1 số âm và không được để trống";
                $this->showError($error);
                return;
            }
           
            if (!isset($_FILES['image']) || $_FILES['image']['error'] != UPLOAD_ERR_OK) {
                $error = "Bạn chưa thêm ảnh sản phẩm hoặc ảnh tải lên không hợp lệ.";
                $this->showError($error);
                return;
            }
            
            // Kiểm tra loại file
            $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
            $file_type = $_FILES['image']['type'];
            if (!in_array($file_type, $allowed_types)) {
                $error = "Chỉ chấp nhận ảnh định dạng JPG, PNG.";
                $this->showError($error);
                return;
            }
            
            // Kiểm tra kích thước file (giới hạn: 2MB)
            $max_size = 2 * 1024 * 1024; // 2MB
            $file_size = $_FILES['image']['size'];
            if ($file_size > $max_size) {
                $error = "Kích thước file không được vượt quá 2MB.";
                $this->showError($error);
                return;
            }
            
            // Lấy kích thước ảnh
            list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
            if ($width != 500 || $height != 500) {
                $error = "Kích thước ảnh phải là 500x500 pixel.";
                $this->showError($error);
                return;
            }
            
            // Xử lý đường dẫn lưu file
            $image = "./uploads/" . $_FILES['image']['name'];
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
                $error = "Không thể lưu ảnh. Vui lòng thử lại.";
                $this->showError($error);
                return;
            }
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
        $name_old = $_POST['nameOld'] ?? '';
        $products_id = $_GET['products_id'] ?? 0;
        $info_products = $this->product->select_products_by_id($products_id);
        $name = trim($_POST['name']);
        $category_id = $_POST['category_id'];
        $price = trim($_POST['price']);
        $gianhap = trim($_POST['gianhap']);
        $stock_quantity = trim($_POST['stock_quantity']);
        $status = $_POST['status'];
        $comment = $_POST['comment'];
        $Quantity_sold = $_POST['Quantity_sold'];
        $mota = $_POST['mota'];
        $image_1 = $info_products['image'];
        $data_prd = $this->product->select_where_products_name($name);
        if(empty($name) || empty($price) || empty($gianhap) || empty($stock_quantity)){
            echo "<script>";
            echo "alert('Không Hợp Lệ');";
            echo "window.location = '?act=update_products&products_id=$products_id';";
            echo "</script>";
            return;
        }
        if($name !== $name_old && $data_prd == true){
            echo "<script>";
            echo "alert('Tên sản phẩm bị trùng');";
            echo "window.location = '?act=update_products&products_id=$products_id';";
            echo "</script>";
        }
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
    public function render_list_variant(){
        if(isset($_GET['id'])){
            $products_id = $_GET['id'];
        }
        $data_variant = $this->variant->render_list_variant($products_id);
        require_once "products/list_variant.php";
    }
    public function update_variant(){
        if(isset($_GET['id'])){
            $id_variant = $_GET['id'];
        }
        $data_variant = $this->variant->select_variant_where_id($id_variant);
        require_once "./products/update_variant.php";
    }
    public function post_update_variant(){
        if(isset($_GET['id'])){
            $variant_id = $_GET['id'];
        }
        if(empty($_POST['size_new'])){
            $size = $_POST['size_old'];
        }else{
            $size = $_POST['size_new'];
        }
        if(empty($_POST['color_new'])){
            $color = $_POST['color_old'];
        }else{
            $color = $_POST['color_new'];
        }
        if ($_FILES['image_new']['error'] == UPLOAD_ERR_OK) {
            $image = "./uploads" . "/" . $_FILES['image_new']['name'];
            move_uploaded_file($_FILES['image_new']['tmp_name'], $image); // Di chuyển file ảnh vào thư mục uploads
          } else {
           $image = $_POST['image_old'];
          } 
          $status = $_POST['status'];
       $stock_quantity = $_POST['stock_quantity'];
       $product_id = $_GET['id_prd'];
       $this->variant->update_variant($size,$color,$stock_quantity,$image,$status,$variant_id);
       echo "<script>";
        echo "alert('Sửa Thành Công');";
        echo "window.location = '?act=render_list_variant&id=$product_id';";
        echo "</script>";
    }
    public function add_variant(){
        $product_id = $_GET['id'];
        $data_product = $this->product->select_products_by_id($product_id);
        require_once "products/add_variant.php";
    }
    public function post_insert_variant(){
        $product_id = $_GET['id_variant'];
        $name = $_POST['name'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $stock_quantity = trim($_POST['stock_quantity']);
        $image = "./uploads"."/". $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],$image);
        if(empty($stock_quantity)){
            echo "<script>";
        echo "alert('không để trống số lượng tồn kho');";
        echo "window.location = '?act=add_variant&id=$product_id';";
        echo "</script>";
            return;
        }
        $this->variant->add_variant($product_id,$size,$color,$stock_quantity,$image);
        echo "<script>";
        echo "alert('Thêm Mới Thành Công');";
        echo "window.location = '?act=render_list_variant&id=$product_id';";
        echo "</script>";

    }
    public function hidden_variant(){

    }
    public function showError($error){
       $data_category =  $this->category->render_categories();
        require_once "./products/add_products.php";
    }
    public function list_comment(){
        $limit = 10;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 10;
        $data_comment = $this->comment->render_comment($limit,$offset);
        require_once "./products/comment.php";
    }
    public function list_voucher(){
        $data_voucher = $this->voucher->select();
        require_once "products/list_voucher.php";
    }
    public function add_voucher(){
        require_once "products/add_voucher.php";
    }
    public function post_insert_voucher(){
        $code = trim($_POST['code']) ?? "";
        $discprs = trim($_POST['discount_percent']/100) ?? "";
        $quantity = trim($_POST['quantity']) ?? "";
        $minimum = trim($_POST['minimum']) ?? "";
        $this->voucher->add_voucher($code,$discprs,$quantity,$minimum);
        echo "<script>";
        echo "alert('Thêm Mới Thành Công');";
        echo "window.location = '?act=list_voucher';";
        echo "</script>";
    }
    public function update_voucher(){
        $id = $_GET['id'] ?? "";
        $data = $this->voucher->select_byID($id);
        require_once "products/update_voucher.php";
    }
    public function post_update_voucher(){
        $id = $_GET['id'] ?? "";
        $code = trim($_POST['code']) ?? "";
        $discprs = trim($_POST['discount_percent']/100) ?? "";
        $quantity = trim($_POST['quantity']) ?? "";
        $minimum = trim($_POST['minimum']) ?? "";
        $this->voucher->update_voucher($code,$discprs,$quantity,$minimum,$id);
        echo "<script>";
        echo "alert('Thành Công');";
        echo "window.location = '?act=list_voucher';";
        echo "</script>";
    }

}
$products = new products();