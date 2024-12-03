<?php
class categori {
    public $categori;
    public function __construct()
    {
        $this->categori = new categories();
    }
    public function render_List_Category(){
        if($_GET['status'] == "presently"){
            $status = 1;
        }
        if($_GET['status'] == "hidden"){
            $status = 0;
        }
        $limit = 5;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 5;
        $data_catagori = $this->categori->list_cate($status,$limit,$offset);
        require_once "./category/list.php";
    }
    public function render_Add_Category() {
        require_once "./category/add_category.php";
    }
    public function delete_Category() {
        $id = $_GET['category_id'];
        $this->categori->delete_category($id);
        header("Location: ?act=list_category&status=presently");
    }
    public function Add_Category() {
        $name = $_POST['name'];
        $only = $_POST['only'];
        $status = $_POST['status'];
        $image = "./uploads" ."/". $_FILES['image']['name'];
        $this->categori->add_category($name, $only, $status, $image);
        header("Location: ?act=list_category&status=presently");
    }
    public function render_Update_Category() {
        $id = $_GET['category_id'];
        $category = $this->categori->get_category_by_id($id);
    
        if (!$category) {
            header("Location: ?act=list_category&status=presently&error=not_found");
            exit;
        }
    
        require_once "./category/update_category.php";
    }
    
    public function Update_Category() {
        $id = $_POST['category_id'];
        $name = $_POST['name'];
        $only = $_POST['only'];
        $status = $_POST['status'];
    
        if (!empty($_FILES['image']['name'])) {
            $image = "./uploads/" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image); 
        } else {
            $image = $_POST['current_image']; 
        }
    
        $this->categori->update_category($id, $name, $only, $status, $image);
        header("Location: ?act=list_category&status=presently");
    }
    public function category_an(){
        $data_catagori = $this->categori->cate_an();
        require_once "./category/category_an.php";
    }
    public function presently_category(){
        $id = $_GET['category_id'];
        $this->categori->presently_category($id);
        header("Location: ?act=list_category&status=presently");
    }
}
$category = new categori();