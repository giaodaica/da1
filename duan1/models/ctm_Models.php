<?php
class customers_models extends database{
    protected $table = "customer_info";
    public function renderInfo($user_id){
        $sql = "SELECT * FROM `customer_info` WHERE `customer_info`.`user_id` = '$user_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function insert_info_ctm($user_id,$full_name,$phone,$address,$gender,$date_of_birth){
        $sql = "INSERT INTO `customer_info` ( `user_id`, `full_name`, `phone`, `address`, `gender`, `date_of_birth`)
         VALUES ('$user_id', '$full_name', '$phone', '$address', '$gender', '$date_of_birth')";
         $this->conn->exec($sql);
    }
    public function update_info_ctm($user_id,$full_name,$phone,$address,$gender,$date_of_birth){
        $sql = "UPDATE `customer_info` SET 
        `full_name` = '$full_name', `phone` = '$phone', `address` = '$address', `gender` = '$gender', `date_of_birth` = '$date_of_birth'
         WHERE `customer_info`.`user_id` = '$user_id'";
         $this->conn->exec($sql);
    }
}