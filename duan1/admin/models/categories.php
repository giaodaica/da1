<?php
class categories extends database{
    protected $table = "categories";
    public function render_categories(){
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function list_cate($status,$limit,$offset){
        $sql = "SELECT categories.category_id, categories.name AS category_name, categories.image, categories.status,categories.only,
         COUNT(products.product_id) AS product_count FROM categories LEFT JOIN products ON categories.category_id = products.category_id
          AND products.comment = '1' WHERE categories.status = $status GROUP BY categories.category_id, categories.name LIMIT $limit OFFSET $offset";
          $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}