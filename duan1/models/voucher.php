<?php
class voucher extends database {
    protected $table = "vouchers";
    public function select_voucher($cher){
        $sql = "SELECT * FROM `vouchers`WHERE vouchers.discount_percent = $cher;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}