<?php
class customers_models extends database{
    protected $table = "customer_info";
    public function renderInfo($user_id){
        $sql = "SELECT * FROM `customer_info` WHERE `customer_info`.`user_id` = '$user_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}