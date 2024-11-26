<?php
class comment_users extends database {
    public function render_Comment($products_id){
        $sql = "SELECT ratings.*,customer_info.full_name FROM ratings JOIN customer_info ON ratings.customer_id = customer_info.user_id WHERE product_id = $products_id;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function checkduplicate($customers_id,$product_id){
        $sql = "SELECT * FROM ratings where customer_id = $customers_id and product_id = $product_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();         
    }
    public function create_comment($user_id,$products_id,$comment){
        $sql = "INSERT INTO `ratings` (`customer_id`, `product_id`, `comments`, `rating_date`, `status`) 
        VALUES ('$user_id', '$products_id', '$comment', CURRENT_TIMESTAMP, '1')";
        $this->conn->exec($sql);
    }
}