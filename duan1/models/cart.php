<?php
class shoping_cart extends database {
    protected $table = "cart_items";
    public function render_cart_where_user($user_id){
        $sql = "SELECT cart_items.*, shopping_cart.*, products.name
        FROM cart_items
        JOIN shopping_cart ON cart_items.cart_id = shopping_cart.cart_id
        JOIN products ON cart_items.product_id = products.product_id
        WHERE shopping_cart.user_id = '$user_id';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insert_Cart_items_of_user($cart_id, $product_id, $size, $color,$image,$price_present){
        $sql = "INSERT INTO `cart_items` (`cart_id`, `product_id`, `size`, `color`, `quantity`, `image`, `price`)
         VALUES ( '$cart_id', '$product_id', '$size', '$color', '1', '$image', '$price_present')";
         $this->conn->exec($sql);
    }
    public function check_duplicate_cart($cart_id, $product_id, $size, $color){
        $sql = "SELECT * FROM cart_items WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND color = '$color' AND size = '$size';";
        $stmt =  $this->conn->query($sql);
        $stmt ->execute();
        return $stmt->fetch();
    }
    public function update_quantity($value,$cart_id){
        $sql = "UPDATE `cart_items` SET `quantity` = '$value' WHERE `cart_items`.`cart_item_id` = '$cart_id'";
        // echo $sql;
        // die;
        $this->conn->exec($sql);
    }
    public function sum_total($cart_id){
        $sql = "SELECT SUM(cart_items.quantity * cart_items.price) AS tong 
        FROM cart_items 
        WHERE cart_id = '$cart_id';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function delete_item($cart_item_id){
        $sql = "DELETE FROM `cart_items` WHERE `cart_items`.`cart_item_id` = '$cart_item_id';";
        $this->conn->exec($sql);
    }
    public function delete_cart($id){
        $sql = "DELETE FROM cart_items WHERE cart_id = $id;";
        $this->conn->exec($sql);
    }
}