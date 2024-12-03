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
          AND products.comment = '1' WHERE categories.status = $status GROUP BY categories.category_id, categories.name 
          LIMIT $limit OFFSET $offset";
          $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete_category($id) {
        $sql = "UPDATE `categories` SET `status` = '0' WHERE `categories`.`category_id` = $id";
        $this->conn->exec($sql);
    }
    public function add_category($name, $only, $status, $image) {
        $sql = "INSERT INTO categories (name, only, status, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$name, $only, $status, $image]);
    }
    public function get_category_by_id($id) {
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
    
        if (!$result) {
            return false;
        }
    
        return $result;
    }
    
    public function update_category($id, $name, $only, $status, $image) {
        $sql = "UPDATE categories SET name = ?, only = ?, status = ?, image = ? WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$name, $only, $status, $image, $id]);
    }
    public function cate_an(){
        $sql = "SELECT categories.category_id, categories.name AS category_name, categories.image, categories.status,categories.only,
         COUNT(products.product_id) AS product_count FROM categories LEFT JOIN products ON categories.category_id = products.category_id
          AND products.comment = '1' WHERE categories.status = '0' GROUP BY categories.category_id, categories.name";   
          $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function presently_category($id){
        $sql = "UPDATE `categories` SET `status` = '1' WHERE `categories`.`category_id` = $id";
        $this->conn->exec($sql);
    }
}