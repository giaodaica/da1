<?php
class voucher extends  database{
    protected $table = "vouchers";
    public function add_voucher($code,$discount_percent,$quantity,$minimum){
        $sql = "INSERT INTO `vouchers` ( `code`, `discount_percent`, `quantity`, `minimum`) 
        VALUES ( '$code', '$discount_percent', '$quantity', '$minimum')";
        $this->conn->exec($sql);
    }
    public function select_byID($id){
        $sql = "SELECT * FRom vouchers where voucher_id = $id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function update_voucher($code,$dc,$q,$m,$id){
        $sql = "UPDATE `vouchers` SET `code` = '$code',
         `discount_percent` = '$dc', `quantity` = '$q', `minimum` = '$m' WHERE `vouchers`.`voucher_id` = $id";
         $this->conn->exec($sql);
    }
    
}