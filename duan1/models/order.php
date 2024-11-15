<?php
class order extends database {
    protected $table = "orders";
    public function orders_products($user_id,$voucher_id,$total,$name,$phone,$address){
        $sql = "INSERT INTO `orders` ( `user_id`, `voucher_id`, `total_amount`, `order_date`, `status`, `recipient_name`, `recipient_phone`, `recipient_address`) 
        VALUES ( '$user_id', '$voucher_id', '$total', CURRENT_TIMESTAMP, 'Chờ xử lý', '$name', '$phone', '$address')";
            // echo $sql;
            // die;
        $this->conn->exec($sql);
        $order_id = $this->conn->lastInsertId();
        return $order_id;

    }
    public function select_order($id){
        $sql = "SELECT * FROM orders WHERE user_id = $id;";
        $stmt =  $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}