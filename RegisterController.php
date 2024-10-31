<?php
require_once 'RegisterController.php';

$message = '';
$userManagement = new UserManagement('localhost', 'ics_e', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input
    if (empty($username) || empty($email) || empty($password)) {
        $message = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format.';
    } elseif (strlen($password) < 8) {
        $message = 'Password must be at least 8 characters long.';
    } else {
        // Attempt registration
        try {
            $userId = $userManagement->registerUser($username, $email, $password);
            $message = "User registered successfully. You can now <a href='login.php'>log in</a>.";
        } catch (PDOException $e) {
            $message = 'Registration failed: ' . $e->getMessage();
        }
    }
}
?>
