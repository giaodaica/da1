<?php
class sanpham
{
    public $conn;
    function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=db_duan1", "root", "");
    }
    public function list_product()
    {
        $sql = "SELECT * FROM `products`";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function add_product($name, $category_id, $price, $stock_quantity, $status, $image)
    {
        $sql = "INSERT INTO `products` (`name`, `category_id`, `price`, `stock_quantity`, `status`, `image`)
        VALUES ('$name', '$category_id', '$price', '$stock_quantity', '$status', '$image')";
        $this->conn->exec($sql);
    }

    public function delete_product($product_id)
    {
    $sql = "DELETE FROM products WHERE product_id=".$product_id;
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    }
    public function find_one($product_id)
    {
        $sql = "SELECT * FROM products WHERE product_id=$product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_ASSOC); 
    }
}
