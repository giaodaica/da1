<?php
class variant_products extends database {
    protected $table = "product_variants";
    public function render_list_variant($product_id){
        $sql = "SELECT products.name,product_variants.* FROM products JOIN product_variants ON products.product_id = product_variants.product_id WHERE products.product_id = $product_id;";
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
    public function update_variant($size,$color,$stock_quantity,$image,$variant_id){
        $sql = "UPDATE `product_variants` SET `size` = '$size', `color` = '$color', `stock_quantity` = '$stock_quantity',
         `image` = '$image' WHERE `product_variants`.`variant_id` = $variant_id";
        //  echo $sql;
        //  die;
         $this->conn->exec($sql);
    }
    public function add_variant($product_id,$size,$color,$stock_quantity,$image){
        $sql = "INSERT INTO `product_variants` ( `product_id`, `size`, `color`, `stock_quantity`, `image`) 
        VALUES ( '$product_id', '$size', '$color', '$stock_quantity', '$image')";
        $this->conn->exec($sql);
    }
}