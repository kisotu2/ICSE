<html>
<?php
// Importing the PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load the composer autoload
require '../autoload.php';

if(isset($_POST["register"]))
{
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

    // True enables the exceptions for debugging
    $mail = new PHPMailer(true);
    try {
        // Enable verbose debug output (0 for no debug output)
        $mail->SMTPDebug = 0; // SMTP::DEBUG_SERVER;

        // Send using SMTP
        $mail->isSMTP();

        // Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        // Enable SMTP authentication
        $mail->SMTPAuth = true;

        // SMTP username
        $mail->Username = 'kisotusamuel1@gmail.com';

        // SMTP password
        $mail->Password = 'grcfyjpflbfcqpsd';

        // Enable TLS encryption
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        // TCP port to connect to (587 for TLS encryption)
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('kisotusamuel1@gmail.com', 'Samuel Kisotu');

        // Add a recipient
        $mail->addAddress($email, $name);

        // Set email format to HTML
        $mail->isHTML(true);

        // Generate verification code
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->Subject = 'Email Verification';
        $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        // Send the email
        $mail->send();

        // Encrypt the password
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        
    }
}

// Include additional files
include('navbar.php');
include('authentication.php');
?>
<link rel="stylesheet" href="styles.css">

<div class="main-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="../include/app.php">
                            <div class="mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">User Name</label>
                                <input type="text" name="user_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="register" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
