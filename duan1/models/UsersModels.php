<?php
class User_model extends database
{
    protected $table = "users";

    public function create_User($username, $password)
    {
        $sql = "INSERT INTO `users` (`username`, `password`, `role`) VALUES ('$username', '$password', '4')";
        $this->conn->exec($sql);
    }
    public function select_User($username){
        $sql = "SELECT * FROM `users` where `username` = '$username'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $data = $stmt->fetch();
    }
    public function select_UserID($user_id){
        $sql = "SELECT * FROM `users` where `user_id` = '$user_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $data = $stmt->fetch();
    }
    public function login($username,$password){
        $sql = "SELECT * FROM `users` where `username` = '$username' and `password` = '$password'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $data = $stmt->fetch();
    }
    public function change_password($password,$user_id){
        $sql = "UPDATE `users` SET `password` = '$password' WHERE `users`.`user_id` = $user_id";
        
        $this->conn->exec($sql);
    }
   
}

