<?php
class danhmuc {
    public $conn;
     public function __construct()
    {
            $this->conn = new PDO("mysql:host=localhost;dbname=db_duan1","root","");
    }
    public function hienthidanhmuc(){
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}