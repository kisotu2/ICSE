<?php
define('DB_HOST', 'localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','learning');

include('DatabaseConnection.php');
$db = new DatabaseConnection;

function validateInput($dbcon,$input){
    return mysqli_real_escape_string($dbcon,$input);
}
?>