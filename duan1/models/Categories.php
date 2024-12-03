<?php
class Categories_models extends database{
    protected $table = "categories";
    public function select_giao(){
        $sql = "SELECT * from $this->table where status = '1'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }   
}