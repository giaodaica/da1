<?php
class comments extends database{
    public function render_comment($limit,$offset){
        $sql = "SELECT ratings.*,customer_info.full_name from ratings join customer_info on ratings.customer_id = customer_info.user_id limit $limit offset $offset";
       
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}