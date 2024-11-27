<?php
class blacklist extends database{
    public function insert_list($email,$phone,$user_id){
        $sql = "INSERT INTO `black_list` ( `email`, `phone`, `user_id`) VALUES ( '$email', '$phone', '$user_id')";
        $this->conn->exec($sql);
    }
}