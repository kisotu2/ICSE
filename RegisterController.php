<?php 
session_start();
include('app.php');

class RegisterController {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    // Insert user data into the users table
    public function registration($fname, $email, $username, $password, $genderId, $roleId) {
        $register_query = "INSERT INTO users (fullname, email, username, password, gender_id, role_id, updated) 
                           VALUES ('$fname', '$email', '$username', '$password', '$genderId', '$roleId', NOW())";
        $result = $this->conn->query($register_query);
        return $result;
    }

    // Check if the user exists
    public function isUserExists($email) {
        $checkUser = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
        $result = $this->conn->query($checkUser);
        return $result->num_rows > 0;
    }

    // Confirm password match
    public function confirmPassword($password, $confirm_password) {
        return $password === $confirm_password;
    }

    // Redirect with message
    public function redirect($message, $page) {
        $_SESSION['message'] = $message;
        header("Location: $page");
        exit(0);
    }
}
?>
