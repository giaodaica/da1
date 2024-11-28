<?php
class order extends database
{
    public function render_order_by_user($user_id)
    {
        $sql = "SELECT * FROM orders WHERE orders.user_id = $user_id;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getOrderDetails($order_id) {

        
    }

    public function get_All_Order($limit,$offset)
    {
            $sql = "SELECT * FROM orders ORDER BY order_date DESC LIMIT $limit OFFSET $offset;";
            $stmt =  $this->conn->query($sql);
            $stmt->execute();
            return $stmt->fetchAll();
    }
    public function updateStatus($order_id, $status) {
        $sql = "UPDATE orders SET status = :status WHERE order_id = :order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':order_id', $order_id);
        return $stmt->execute();
    }
    public function action_history($action,$limit,$offset){
        $sql = "SELECT orders.*,vouchers.discount_percent FROM orders JOIN vouchers ON orders.voucher_id=vouchers.voucher_id WHERE orders.status = '$action' ORDER BY order_date DESC LIMIT $limit OFFSET $offset";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function change_action($action,$order_id){
        $sql = "UPDATE `orders` SET `status` = '$action' WHERE `orders`.`order_id` = $order_id";
        $this->conn->exec($sql);
    }
    public function detail_shopingCart($order_id){
        $sql = "SELECT order_details.*,products.name FROM order_details JOIN
         products ON order_details.product_id=products.product_id WHERE order_details.order_id = $order_id;";
         $stmt = $this->conn->query($sql);
         $stmt->execute();
         return $stmt->fetchAll();
    }
    public function select_order($order_id){
        $sql = "SELECT * FROM orders where order_id = $order_id";
        $stmt = $this->conn->query($sql);
         $stmt->execute();
         return $stmt->fetch();
    }
      public function select_orderAll($order_id){
        $sql = "SELECT orders.*,vouchers.discount_percent FROM orders JOIN vouchers ON orders.voucher_id=vouchers.voucher_id WHERE orders.order_id = $order_id;";
        $stmt = $this->conn->query($sql);
         $stmt->execute();
         return $stmt->fetchAll();
    }
    public function update_info($name,$phone,$address,$email,$note,$order_id){
        $sql = "UPDATE `orders` SET `recipient_name` = '$name', `recipient_phone` = '$phone', 
        `recipient_address` = '$address', `email` = '$email', `note` = '$note' WHERE `orders`.`order_id` = $order_id";
        $this->conn->exec($sql);
    }
    
}
