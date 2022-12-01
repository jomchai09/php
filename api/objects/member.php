<?php
class member {
 
    // database connection and table name
    private $conn;
    private $table_name = "member ";
 
    // object properties
    public $id;
    public $membername;
    public $memberaddress;
    
    public $phone;
    
    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all member s
    function read(){
    
        // select all query
        $query = "SELECT
                    `member id`, `member name`, `member address`, `phone`  
                FROM
                    " . $this->table_name . " 
                ORDER BY
                    id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // get single member  data
    function read_single(){
    
        // select all query
        $query = "SELECT
                    `member id`, `member name`, `member address`,  `phone`
                FROM
                    " . $this->table_name . " 
                WHERE
                    id= '".$this->id."'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create member 
    function create(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`member name`, `member address`,  `phone`,  )
                  VALUES
                        ('".$this->membername."', '".$this->age."', , '".$this->phone."',  )";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    // update member  
    function update(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_membername . "
                SET
                    name='".$this->membername."', age='".$this->memberaddress."',  phone='".$this->phone."',
                WHERE
                    id='".$this->memberid."'";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // delete member 
    function delete(){
        
        // query to insert record
        $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    id= '".$this->memberid."'";
        
        // prepare query
        $stmt = $this->conn->prepare($query);
        
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->member_name . " 
            WHERE
                member address='".$this->memberaddress."'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}