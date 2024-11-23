<?php
class categories extends database{
    protected $table = "categories";
    public function render_categories(){
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}