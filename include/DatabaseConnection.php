<?php
class DatabaseConnection {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if ($this->conn->connect_error) {
            die("<h1>Database connection failed: " . $this->conn->connect_error . "</h1>");
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
