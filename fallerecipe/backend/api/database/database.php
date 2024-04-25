<?php

class Db
{
    protected $conn;

    public $dbName = "practice";

    public function __construct(){
        $this->conn = new mysqli("localhost","root","");
        $isCreated = $this->conn->query("CREATE DATABASE IF NOT EXISTS $this->dbName");
        $this->conn->query("USE $this->dbName");
        if ($isCreated){
            return json_encode(['message' => 'Database is created']);
    }
}
}


?>