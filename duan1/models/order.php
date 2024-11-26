<?php
class order extends database {
    protected $table = "orders";
    public function orders_products($user_id,$voucher_id,$total,$name,$phone,$address,$email,$key_limited){
        $sql = "INSERT INTO `orders` ( `user_id`, `voucher_id`, `total_amount`, `order_date`, `status`, `recipient_name`, `recipient_phone`, `recipient_address`,`email`,`key_limited`) 
        VALUES ( '$user_id', '$voucher_id', '$total', CURRENT_TIMESTAMP, 'Chờ xử lý', '$name', '$phone', '$address','$email','$key_limited')";
            // echo $sql;
            // die;
        $this->conn->exec($sql);
        $order_id = $this->conn->lastInsertId();
        return $order_id;

    }
    public function select_order_by_order_id($order_id){
        $sql = "SELECT * FROM orders WHERE order_id = $order_id;";
        $stmt =  $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function select_order($id,$limit,$offset){
        $sql = "SELECT * FROM orders WHERE user_id = $id ORDER BY order_date DESC LIMIT $limit OFFSET $offset;";
        $stmt =  $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function cancel($order_id){
        $sql = "UPDATE `orders` SET `status` = 'Đã hủy' WHERE `orders`.`order_id` = $order_id";
        $this->conn->exec($sql);
    }
    public function action_history($action,$user_id,$limit,$offset){
        $sql = "SELECT * FROM `orders` WHERE status = '$action' and `user_id` = $user_id ORDER BY order_date DESC LIMIT $limit OFFSET $offset";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function premium_user($user_id){
        $sql = "SELECT * FROM orders WHERE orders.user_id = $user_id AND orders.status = 'Đã hoàn tất';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function select_by_key($key_limited){
        $sql = "SELECT orders.*,order_details.*,products.name FROM orders LEFT JOIN order_details ON orders.order_id = order_details.order_id 
        JOIN products ON order_details.product_id= products.product_id WHERE orders.key_limited = '$key_limited';";
         $stmt = $this->conn->query($sql);
         $stmt->execute();
         return $stmt->fetch();
    }
}