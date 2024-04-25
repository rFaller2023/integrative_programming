<?php

include_once '../database/database.php';


class Student extends Db
{
    public function CreateTable(){
        $isCreated = $this->conn->query("CREATE TABLE IF NOT EXISTS customers(
            id int auto_increment primary key,
            first_name varchar(255) not null,
            last_name varchar(255) not null,
            address varchar(255) not null,
            age varchar(255) not null,
            phone_number varchar (255) not null,
            email varchar(255) not null unique

            )engine=InnoDB");

          if($isCreated == true){
            return json_encode(['message' => 'table created successfully']);
    }
}
}
$new =new Student();
echo $new->CreateTable();
?>