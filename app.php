<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
// Import the DatabaseConnection class and PHPMailer
include('../DatabaseConnection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../autoload.php';

if(isset($_POST["register"])) {
    $name = $_POST["fname"];
    $email = $_POST["email"];
    $username = $_POST["user_name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Encrypt the password
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $db = new DatabaseConnection();
    $conn = $db->getConnection();

    // Prepare the SQL query to insert the user
    $stmt = $conn->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $username, $encrypted_password);

    if ($stmt->execute()) {
        // Send verification email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Enable verbose debug output
            $mail->SMTPDebug = 0;

            // Send using SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kisotusamuel1@gmail.com';
            $mail->Password = 'grcfyjpflbfcqpsd';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('kisotusamuel1@gmail.com', 'Samuel Kisotu');
            $mail->addAddress($email, $name);

            // Set email format to HTML
            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Email Verification';
            $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

            // Send the email
            $mail->send();

            echo "Registration successful! A verification email has been sent.";
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
