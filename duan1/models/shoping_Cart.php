<?php
class shoping_cart_big extends database{
    protected $table = "shopping_cart";
    public function insert_cart_user($id){
        $sql = "INSERT INTO `shopping_cart` (`user_id`, `created_at`) VALUES ( '$id', CURRENT_TIMESTAMP)";
        $this->conn->exec($sql);
        $cart_id = $this->conn->lastInsertId();
        return $cart_id;
    }
    public function select_cart_of_user($id){
        $sql = "SELECT * FROM shopping_cart WHERE user_id = '$id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}