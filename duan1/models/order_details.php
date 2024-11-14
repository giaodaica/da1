<?php
class order_detail extends database{
    protected $table = "order_details";
    public function insert_orders_detail($order_id, $product_id, $quantity, $price,$color,$size,$image){
        $sql = "INSERT INTO `order_details` ( `order_id`, `product_id`, `quantity`, `price`,`color`,`size`,`image`) 
        VALUES ( '$order_id', '$product_id', '$quantity', '$price','$color','$size','$image')";
        $this->conn->exec($sql);

    }
}