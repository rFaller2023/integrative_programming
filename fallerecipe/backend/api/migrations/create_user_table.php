<?php

include_once '../database/database.php';


class Table extends Db
{
    public function CreateTable(){
        $isCreated = $this->conn->query("CREATE TABLE IF NOT EXISTS users(
            id int auto_increment primary key,
            first_name varchar(255) not null,
            last_name varchar(255) not null,
            email varchar(255) not null unique,
            password varchar(255) not null

            )engine=InnoDB");

          if($isCreated == true){
            return json_encode(['message' => 'table created successfully']);
    }
}
}
$new =new Table();
echo $new->CreateTable();
?>