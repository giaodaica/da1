<?php
class sanpham {
    public $conn;
     public function __construct()
    {
            $this->conn = new PDO("mysql:host=localhost;dbname=db_duan1","root","");
    }
    public function hienthisanpham(){
        $sql = "SELECT * FROM `products`";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function add_product($name,$category_id,$price,$image,$quantity_sold,$mota){
        $sql = "INSERT INTO `products` ( `name`, `category_id`, `price`, `stock_quantity`, `status`, `image`, `Quantity_sold`, `mota`) 
        VALUES ('$name', '$category_id', '$price', '0', 'Available', '$image', '$quantity_sold', '$mota')";
        $this->conn->exec($sql);
    }
}