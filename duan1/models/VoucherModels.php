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
        $sql = "SELECT user_vouchers.user_id,
        vouchers.code,
        vouchers.discount_percent
        FROM user_vouchers
        JOIN vouchers ON user_vouchers.voucher_id = vouchers.voucher_id
        WHERE user_vouchers.user_id = '$id'
        GROUP BY vouchers.code,vouchers.discount_percent;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
