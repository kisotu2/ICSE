<?php
include('codes/app.php');
include_once('controllers/RegisterController.php');

if(isset($_POST['register_btn'])){
    $fname = validateInput($db->conn,$_POST['fname']);
    $fname = validateInput($db->conn,$_POST['email']);
    $fname = validateInput($db->conn,$_POST['username']);
    $fname = validateInput($db->conn,$_POST['password']);
    $fname = validateInput($db->conn,$_POST['confirm_password']);

    $register = new RegisterController;

}
?>