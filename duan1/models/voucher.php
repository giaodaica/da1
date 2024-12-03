<?php
class voucher extends database {
    protected $table = "vouchers";
    public function select_voucher($cher){
        $sql = "SELECT * FROM `vouchers`WHERE vouchers.discount_percent = $cher;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function select_byID(){
        $sql = "SELECT * from vouchers where voucher_id = 2 or voucher_id = 3 ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function select_quantity($id){
        $sql = "SELECT * from vouchers where voucher_id = $id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function update_quantity($voucher_id){
        $sql = "UPDATE `vouchers` SET `quantity` = quantity - 1 WHERE `vouchers`.`voucher_id` = $voucher_id";
        $this->conn->exec($sql);
    }
}