<?php
include('include/app.php');
include_once('controllers/RegisterController.php');

if(isset($_POST['register_btn'])){
    $fname = validateInput($db->conn,$_POST['fname']);
    $email = validateInput($db->conn,$_POST['email']);
    $username = validateInput($db->conn,$_POST['username']);
    $password = validateInput($db->conn,$_POST['password']);
    $confirm_password = validateInput($db->conn,$_POST['confirm_password']);

    $register = new RegisterController;
    $result_password = $register->confirmPassword($password,$confirm_password);
    if($result_password){

    }
    else{
       redirect ("Password & Confirm Password do not match","register.php");
    }

}
?>