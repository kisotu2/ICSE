<?php 
class DatabaseConnection{
    public function _construct(){
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        if (!$conn){
            die("<h1>Database connection failed</h1>");

        }
       return $this-> conn = $conn;
    }
}
?>