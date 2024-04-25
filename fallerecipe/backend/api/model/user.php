<?php
include_once '../database/database.php';
header('Access-Control-Allow-Origin: *');
class User extends Db{

    public function Register($params){
        if(empty($params['first_name'])){
            return json_encode(['message' => 'first name is required']);
        }
        if(empty($params['last_name'])){
            return json_encode(['message' => 'last name is required']);
        }
        if(empty($params['email'])){
            return json_encode(['message' => 'Email is required']);
        }
        if(empty($params['password'])){
            return json_encode(['message' => 'password is required']);
        }
       $first_name = $params['first_name'];
       $last_name = $params['last_name'];
       $email = $params['email'];
       $password = $params['password'];
        
       if(strlen($password) < 8){
        return json_encode(['message' => 'password required atleast 8 character']);
       }
       $checkEmail = $this->conn->query("SELECT * FROM users WHERE email='$email'");
       if($checkEmail->num_rows> 0)
       {
        return json_encode(['message' => 'Email is Already Exists']);
       }
       $hashPassword = password_hash($password, PASSWORD_BCRYPT);
       $isInserted = $this->conn->query("INSERT INTO users (first_name, last_name, email, password)
       VALUES ('$first_name', '$last_name', '$email', '$hashPassword')");
       if($isInserted){
        return json_encode(['message' => 'registered successfully']);
       }
    }

    public function login($params){
        if(empty($params['email'])){
            return json_encode(['message' => 'email is required']);
        }
        if(empty($params['password'])){
            return json_encode(['message' => 'password is required']);
        }
        $email = $params['email'];
        $password = $params['password'];

        
        $login = $this->conn->query("SELECT * FROM users WHERE email='$email'");
    
       
        // var_dump($result['password']);
        // if(password_verify($password, $login->password)){
        //     return json_encode(['message' => 'login successfully']);
        // }else{
        //     return json_encode(["message"=> "login failed"]);
        // } 
        // }
        if($login == true)
        {
            $result = $login->fetch_assoc();
            if(password_verify($password, $result['password'])){
                return json_encode(['message'=> 'login successfully']);
            }else{
                return json_encode(['message' => 'wrong password']);
            }
        }else{
            return json_encode(['message' => 'email is wrong']);
        }
    }


}

?>