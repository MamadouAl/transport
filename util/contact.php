<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/phpmailer/src/Exception.php';
require './phpmailer/phpmailer/src/PHPMailer.php';
require './phpmailer/phpmailer/src/SMTP.php';

// Création d'une instance de PHPMailer
$mail = new PHPMailer(true);


try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tygaaliou@gmail.com'; // Remplacez par votre adresse Gmail
    $mail->Password = 'sqghpubtjlfpkgqu'; // Remplacez par votre mot de passe Gmail ou utilisez un mot de passe d'application
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Destinataire et expéditeur
    $mail->setFrom('tygaaliou@gmail.com', 'Mad Al');
    $mail->addAddress('tygaaliou@gmail.com', 'Destinataire');

    // Contenu de l'e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Test d\'e-mail avec PHPMailer';
    $mail->Body = '<h1>Ceci est un e-mail de test envoyé depuis PHPMailer.</h1>';

    // Envoi de l'e-mail
    $mail->send();
    echo 'L\'e-mail a été envoyé avec succès.';
} catch (Exception $e) {
    echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
}
?>

