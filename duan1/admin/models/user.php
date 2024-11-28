<?php 
class User_Model extends database {
    public function get_All_Users(){
        $db = "SELECT * FROM users";
        $stmt = $this->conn->prepare($db);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}