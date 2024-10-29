<?php
class database{
    public $conn;
    protected $table;
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=db_duan1","root","");
    }
        public  function select(){
        
                $result = [];
                $sql = "SELECT * FROM $this->table";
                $query = $this->conn->query($sql);

                while($row = $query->fetchObject()){
                        $result[]= $row;
                }
                return $result;
        }
    
    public  function find($id){
        $sql = "SELECT * FROM $this->table Where id =  $id ";
        $query = $this->conn->query($sql);
        return $query->fetchObject();
}
        public  function delete($id){
        

            $sql = "DELETE FROM $this->table Where id =  $id ";
            return $this->conn->exec($sql);
            
        }
        public  function create($data){
            $keys = array_keys($data);
            $keys = implode(',', $keys);
            $values = array_values($data);
            $values = "'" .implode("','",$values). "'";
            $sql = "INSERT INTO $this->table($keys) values ($values)";
            // $query = $this->conn->execute($sql);
            return $this->conn->exec($sql);
            // echo $sql;
            // return $query->fetchObject();
    }
    public  function update($id,$data){
        
       
        $sql = "UPDATE $this->table SET";
        foreach ($data as $key => $value){
            $sql .= " $key = '$value', ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE id = $id";
        return $this->conn->exec($sql);

}

}
