<?php
class variant_products extends database {
    protected $table = "product_variants";
    public function render_list_variant($product_id){
        $sql = "SELECT products.name,product_variants.* FROM products JOIN product_variants ON products.product_id = product_variants.product_id WHERE products.product_id = $product_id and product_variants.status = '1';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function select_variant_where_id($variant_id){
        $sql = "SELECT product_variants.*,products.name FROM product_variants JOIN products on product_variants.product_id = products.product_id WHERE product_variants.variant_id = $variant_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function update_variant($size,$color,$stock_quantity,$image,$status,$variant_id){
        $sql = "UPDATE `product_variants` SET `size` = '$size', `color` = '$color', `stock_quantity` = '$stock_quantity',
         `image` = '$image',`status` = '$status' WHERE `product_variants`.`variant_id` = $variant_id";
        //  echo $sql;
        //  die;
         $this->conn->exec($sql);
    }
    public function add_variant($product_id,$size,$color,$stock_quantity,$image){
        $sql = "INSERT INTO `product_variants` ( `product_id`, `size`, `color`, `stock_quantity`, `image`,`status`) 
        VALUES ( '$product_id', '$size', '$color', '$stock_quantity', '$image','1')";
        $this->conn->exec($sql);
    }
    public function count_variant($product_id){
        $sql = "SELECT * FROM `product_variants` WHERE product_id = $product_id;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}