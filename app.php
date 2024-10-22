<?php
require_once('DatabaseConnection');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ssn = $_POST['userId'];
    $ssn = $_POST['fullname'];
    $ssn = $_POST['email'];
    $ssn = $_POST['username'];
    $ssn = $_POST['password'];
}

?>