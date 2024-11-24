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
}
$category = new categori();