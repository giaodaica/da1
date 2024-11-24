<?php
class products extends database {
    protected $table = "products";
    public function render_product_by_id($product_id){
        $sql = "SELECT * FROM `products` WHERE `products`.`product_id` = '$product_id';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function render_product($limit,$offset){
        $sql = "SELECT * FROM `products` limit $limit offset $offset";
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
}