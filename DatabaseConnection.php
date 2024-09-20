<?php 
class DatabaseConnection{
    public function _construct(){
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        if ($conn->connect_error){
            die("<h1>Database connection failed</h1>");

        }
        echo "Database Connected Successfully ";
       return $this-> conn = $conn;
    }
}
?>