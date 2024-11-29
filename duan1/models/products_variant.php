<?php
class products_variant extends database {
    protected $table = "product_variants";
    public function renderVariants($color,$product_id){
        $sql = "SELECT * FROM `product_variants` WHERE color = '$color' AND product_id = '$product_id';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
   
    
    
}