<?php
class products extends database {
    protected $table = "products";
    public function render_product_by_id($product_id){
        $sql = "SELECT * FROM `products` WHERE `products`.`product_id` = '$product_id';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function render_product($price_below,$price_above,$limit,$offset){
        $sql = "SELECT * FROM `products` where comment = '1' AND price BETWEEN $price_below AND $price_above limit $limit offset $offset";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function select_by16(){
        $sql = "SELECT * FROM `products` where comment = '1' limit 16 offset 0";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function result_search($key,$price_below,$price_above,$limit,$offset){
        $sql = "SELECT * FROM products WHERE products.name LIKE '%$key%' AND price BETWEEN $price_below AND $price_above LIMIT $limit OFFSET $offset";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function filter($where){
        $sql = "SELECT products.*,product_variants.image as img_variant,product_variants.size,product_variants.color FROM products JOIN product_variants ON products.product_id = product_variants.product_id $where ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update_stock_quantity($count,$product_id){
        $sql = "UPDATE `products` SET `stock_quantity` = stock_quantity - $count WHERE `products`.`product_id` = $product_id";
        $this->conn->exec($sql);
    }
    public function update_quantity_sold($Quantity_sold,$product_id){
        $sql = "UPDATE `products` SET `Quantity_sold` = Quantity_sold + $Quantity_sold WHERE `products`.`product_id` = $product_id";
        $this->conn->exec($sql);
    }
    public function update_quantity_sold_where_users_cancel_shoping($Quantity_sold,$product_id){
        $sql = "UPDATE `products` SET `Quantity_sold` = Quantity_sold - $Quantity_sold WHERE `products`.`product_id` = $product_id";
        $this->conn->exec($sql);
    }
    public function update_stock_quantity_where_users_cancel_shoping($count,$product_id){
        $sql = "UPDATE `products` SET `stock_quantity` = stock_quantity + $count WHERE `products`.`product_id` = $product_id";
        $this->conn->exec($sql);
    }
    public function search_by_cate($categori){
        $sql = "SELECT categories.*, products.*,products.name as products_name FROM categories
         JOIN products ON categories.category_id = products.category_id WHERE categories.name = '$categori';";
       
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
}