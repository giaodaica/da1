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
    public function list_products(){
        $sql = "SELECT categories.name as category,products.product_id,products.name,products.price,
        products.stock_quantity,products.status,products.image
         FROM categories JOIN
          products ON categories.category_id = products.category_id";
         
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
        $sql = "DELETE FROM products WHERE product_id=" . $product_id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function find_one($product_id)
    {
        $sql = "SELECT * FROM products WHERE product_id = product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update_product($product_id, $name, $category_id, $price, $stock_quantity, $status, $image)
    {
        $sql = "UPDATE products SET name = :name, category_id = :category_id, price = :price, 
                                    stock_quantity = :stock_quantity, status = :status, image = :image WHERE product_id = :product_id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':category_id' => $category_id,
            ':price' => $price,
            ':stock_quantity' => $stock_quantity,
            ':status' => $status,
            ':image' => $image,
            ':product_id' => $product_id
        ]);
        
    }
    public function select_products($id){
        $sql = "SELECT categories.name as category,products.product_id,products.name,products.price,
        products.stock_quantity,products.status,products.image,products.category_id
         FROM categories JOIN
          products ON categories.category_id = products.category_id WHERE products.product_id = '$id'";
          
          $stmt = $this->conn->query($sql);
          $stmt ->execute();
          return $stmt->fetch();
    }
}
