<?php 
include('app.php');
class RegisterController{
    public function __construct() {
        $db = new DatabaseConnection;
        $this ->conn = $db->conn;
    }
    public function registration($fname,$email,$username,$password){
        $register_query = "INSERT INTO users(fullname,email,username,password,updated) VALUES ('$fname','$email','$username','$password') ";

    }

}


?>