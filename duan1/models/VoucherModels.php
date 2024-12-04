<?php
class Voucher_model extends database
{
    protected $table = "user_vouchers";
    public function gift_Voucher($user_id)
    {
        $sql = "INSERT INTO `user_vouchers` (`user_id`, `voucher_id`, `is_used`, `issued_date`) VALUES ( '$user_id', '1', '0', CURRENT_TIMESTAMP)";
        $this->conn->exec($sql);
    }
    public function select_Gift_byUserID($id)
    {
        $sql = "SELECT user_vouchers.user_id,user_vouchers.is_used,user_vouchers.voucher_id,
        vouchers.code,
        vouchers.discount_percent
        FROM user_vouchers
        JOIN vouchers ON user_vouchers.voucher_id = vouchers.voucher_id
        WHERE user_vouchers.user_id = '$id' and is_used = 0";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function deleta_Gift_after_oder_success($voucher_id,$user_id){
        $sql = "UPDATE `user_vouchers` SET `is_used` = '1' WHERE user_vouchers.voucher_id = $voucher_id and user_id = $user_id";
        $this->conn->exec($sql);
    }
    public function add_voucher_if_delete_order_true_voucher($user_id,$voucher_id){
        $sql = "UPDATE `user_vouchers` SET `is_used` = '0' WHERE user_vouchers.voucher_id = $voucher_id and user_id = $user_id";
        $this->conn->exec($sql);
    }
    public function check_voucher($user_id,$voucher_id){
        $sql = "SELECT * from user_vouchers where user_id = $user_id and voucher_id = $voucher_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function add_voucher_event($user_id,$voucher_id){
        $sql = "INSERT INTO `user_vouchers` ( `user_id`, `voucher_id`, `is_used`, `issued_date`)
         VALUES ( '$user_id', '$voucher_id', '0', CURRENT_TIMESTAMP);";
         $this->conn->exec($sql);
    }
}
