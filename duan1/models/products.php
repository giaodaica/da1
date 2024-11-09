<?php
class products extends database {
    protected $table = "products";
    public function render_product_by_id($product_id){
        $sql = "SELECT * FROM `products` WHERE `products`.`product_id` = '$product_id';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}