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
}