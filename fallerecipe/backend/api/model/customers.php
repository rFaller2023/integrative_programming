<?php
include_once '../database/database.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
class Customer extends Db{

    public function getCustomer(){
        $getAll = $this->conn->query('SELECT * FROM customers');
        $result = $getAll->fetch_all(MYSQLI_ASSOC);
        
        if($result == true){
            return json_encode($result);
        }
    }


    public function Insert($params){
        if(empty($params['first_name'])){
            return json_encode(['message' => 'first name is required']);
        }
        if(empty($params['last_name'])){
            return json_encode(['message' => 'last name is required']);
        }
        if(empty($params['address'])){
            return json_encode(['message' => 'address is required']);
        }
        if(empty($params['age'])){
            return json_encode(['message' => 'age is required']);
        }
        if(empty($params['phone_number'])){
            return json_encode(['message' => 'phone number is required']);
        }
        if(empty($params['email'])){
            return json_encode(['message' => 'email is required']);
        }
       
       $first_name = $params['first_name'];
       $last_name = $params['last_name'];
       $address = $params['address'];
       $age = $params['age'];
       $phone_number = $params['phone_number'];
       $email = $params['email'];
    
        
    //    if(strlen($password) < 8){
    //     return json_encode(['message' => 'password required atleast 8 character']);
    //    }
       $checkEmail = $this->conn->query("SELECT * FROM users WHERE email='$email'");
       if($checkEmail->num_rows> 0)
       {
        return json_encode(['message' => 'Email is Already Exists']);
       }
    //    $hashPassword = password_hash($password, PASSWORD_BCRYPT);
       $isInserted = $this->conn->query("INSERT INTO customers (first_name, last_name, address, age, phone_number, email)
       VALUES ('$first_name', '$last_name', '$address', '$age', '$phone_number','$email')");
       if($isInserted){
        echo json_encode(['message' => 'successfully inserted']);
       }
    }

    // public function login($params){
    //     if(empty($params['email'])){
    //         return json_encode(['message' => 'email is required']);
    //     }
    //     if(empty($params['password'])){
    //         return json_encode(['message' => 'password is required']);
    //     }
    //     $email = $params['email'];
    //     $password = $params['password'];

        
    //     $login = $this->conn->query("SELECT * FROM users WHERE email='$email'");
    
       
        // var_dump($result['password']);
        // if(password_verify($password, $login->password)){
        //     return json_encode(['message' => 'login successfully']);
        // }else{
        //     return json_encode(["message"=> "login failed"]);
        // } 
        // }
        // if($login == true)
        // {
        //     $result = $login->fetch_assoc();
        //     if(password_verify($password, $result['password'])){
        //         return json_encode(['message'=> 'login successfully']);
        //     }else{
        //         return json_encode(['message' => 'wrong password']);
        //     }
        // }else{
        //     return json_encode(['message' => 'email is wrong']);
        // }
    }




?>