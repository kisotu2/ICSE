<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMail {
    public function __construct($mailMsg) {
        // Load Composer's autoloader
        require 'plugins/PHPMailer/vendor/autoload.php';
        
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                           // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';      // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                  // Enable SMTP authentication
            $mail->Username   = getenv('kisotusamuel1@gmail.com');  // SMTP username (use env variables for security)
            $mail->Password   = getenv('grcfyjpflbfcqpsd');  // SMTP password (use env variables for security)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
            $mail->Port       = 465;                   // TCP port to connect to
            
            // Recipients
            $mail->setFrom('kisotusamuel1@gmail.com', 'Samuel Kisotu');
            $mail->addAddress($mailMsg['to'], $mailMsg['name']);  // Recipient's email and name
            
            // Content
            $mail->isHTML(true);                       // Set email format to HTML
            $mail->Subject = $mailMsg['subject'];
            $mail->Body    = nl2br($mailMsg['message']);
            
            // Send the email
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}
?>

<!-- Example usage -->
<?php
$mailData = [
    'to' => 'kisotu.samwel@strathmore.edu',  // Recipient's email
    'name' => 'Lemayian',                   // Recipient's name
    'subject' => 'Test Email Subject',
    'message' => 'This is a test message.'
];

$sendMail = new SendMail($mailData);
?>
