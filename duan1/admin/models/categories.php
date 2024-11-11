<?php 
class danhmuc{
    public $conn;
    function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=db_duan1","root","");
    }
    public function list_categorie(){
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>