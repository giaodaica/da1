<?php
class order_detail extends database{
    protected $table = "order_details";
    public function insert_orders_detail($order_id, $product_id, $quantity, $price,$color,$size,$image){
        $sql = "INSERT INTO `order_details` ( `order_id`, `product_id`, `quantity`, `price`,`color`,`size`,`image`) 
        VALUES ( '$order_id', '$product_id', '$quantity', '$price','$color','$size','$image')";
        $this->conn->exec($sql);
       
    }
    public function select_items_cart($oder_id){
        $sql = "SELECT order_details.*,products.name FROM order_details JOIN products on order_details.product_id = products.product_id WHERE order_details.order_id = $oder_id;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
}