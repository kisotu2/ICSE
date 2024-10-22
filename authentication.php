<?php
include('app.php');
include_once('RegisterController.php');

if (isset($_POST['register'])) {
    $fname = validateInput($db->getConnection(), $_POST['fname']);
    $email = validateInput($db->getConnection(), $_POST['email']);
    $username = validateInput($db->getConnection(), $_POST['user_name']);
    $password = validateInput($db->getConnection(), $_POST['password']);
    $confirm_password = validateInput($db->getConnection(), $_POST['confirm_password']);
    $genderId = $_POST['genderId'];
    $roleId = $_POST['roleId'];

    $register = new RegisterController;

    // Check if passwords match
    if (!$register->confirmPassword($password, $confirm_password)) {
        $register->redirect("Password & Confirm Password do not match", "register.php");
    }

    // Check if the user exists
    if ($register->isUserExists($email)) {
        $register->redirect("User already exists", "login.php");
    }

    // Hash password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Register the user
    $result = $register->registration($fname, $email, $username, $hashed_password, $genderId, $roleId);

    if ($result) {
        $register->redirect("Registration successful", "login.php");
    } else {
        $register->redirect("Registration failed, try again", "register.php");
    }
}
?>
