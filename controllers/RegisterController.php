<?php 
include('app.php');
class RegisterController{
    public function __construct() {
        $db = new DatabaseConnection;
        $this ->conn = $db->conn;
    }
    public function registration($fname,$email,$username,$password){
        $register_query = "INSERT INTO users(fullname,email,username,password,updated) VALUES ('$fname','$email','$username','$password') ";
        $result = $this->conn->query($register_query);
        return $result;

    }
    public function isUserExists($email){
        $checkUser = "SELECT email from users WHERE email= '$email' LIMIT 1";
        $result = $this->conn->query ($checkUser);
        if($result -> num_rows >0){
            return true;
        }
        else{
            return false;
        }

    }
    public function confirmPassword($password,$confirm_password){
        if($password==$confirm_password){
            return true;
        }
        else {
            return false;
        }
    }

}


?>