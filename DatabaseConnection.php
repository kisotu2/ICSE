<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
class DatabaseConnection {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'ics_e');
        if ($this->conn->connect_error) {
            die("<h1>Database connection failed: " . $this->conn->connect_error . "</h1>");
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
