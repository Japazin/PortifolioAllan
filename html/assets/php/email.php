<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

mb_internal_encoding("UTF-8");

$to = 'mateusfma@example.com';
$subject = 'Message from Cryptex';

$name = "";
$email = "";
$phone = "";
$message = "";

if( isset($_POST['name']) ){
    $name = $_POST['name'];

    $body .= "Name: ";
    $body .= $name;
    $body .= "\n\n";
}
if( isset($_POST['subject']) ){
    $subject = $_POST['subject'];
}
if( isset($_POST['email']) ){
    $email = $_POST['email'];

    $body .= "";
    $body .= "Email: ";
    $body .= $email;
    $body .= "\n\n";
}
if( isset($_POST['phone']) ){
    $phone = $_POST['phone'];

    $body .= "";
    $body .= "Phone: ";
    $body .= $phone;
    $body .= "\n\n";
}
if( isset($_POST['message']) ){
    $message = $_POST['message'];

    $body .= "";
    $body .= "Message: ";
    $body .= $message;
    $body .= "\n\n";
}

// Cria uma nova instância do PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'emailaqui'; // Insira seu endereço de e-mail do Gmail
    $mail->Password   = 'senhaaqui'; // Insira sua senha do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configurações do e-mail
    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    // Envia o e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail->send();
        echo '<div class="status-icon valid"><i class="fa fa-check"></i></div>';
    } else {
        echo '<div class="status-icon invalid"><i class="fa fa-times"></i></div>';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
