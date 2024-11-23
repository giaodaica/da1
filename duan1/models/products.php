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
}