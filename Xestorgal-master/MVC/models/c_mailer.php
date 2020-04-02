<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';




class c_mailer
{
    public $mail;

    function mailer()
    {
        $this->mail = new PHPMailer(true);
        //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $this->mail->isSMTP(); // Send using SMTP
        $this->mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $this->mail->SMTPAuth = true; // Enable SMTP authentication
        $this->mail->Username = 'xestorgal@gmail.com'; // SMTP username
        $this->mail->Password = 'X3st0rg4l'; // SMTP password
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );
        $this->mail->SMTPSecure = 'ssl'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $this->mail->Port = 465; // TCP port to connect to
    }

    function enviaCorreoReseteoPassword($email, $contraseñaNueva)
    {
        try {
            $this->mail = new PHPMailer(true);
            //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $this->mail->isSMTP(); // Send using SMTP
            $this->mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $this->mail->SMTPAuth = true; // Enable SMTP authentication
            $this->mail->Username = 'xestorgal@gmail.com'; // SMTP username
            $this->mail->Password = 'X3st0rg4l'; // SMTP password
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ),
            );
            $this->mail->SMTPSecure = 'ssl'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $this->mail->Port = 465; // TCP port to connect to
            //Recipients
            $this->mail->setFrom('xestorgal@gmail.com', 'Xestor');
            $this->mail->addAddress($email); // Add a recipient
            $this->mail->addReplyTo('xestorgal@gmail.com', 'Xestor');

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = 'XestorGal';
            $this->mail->Body = 'O seu novo contrasinal é: ' . $contraseñaNueva;
            $this->mail->AltBody = 'O seu novo contrasinal é: ' . $contraseñaNueva;

            if ($this->mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return "Non se puido enviar o correo. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    function enviaCorreoContacto($email, $login, $asunto, $contido)
    {

        try {
            $this->mail = new PHPMailer(true);
            //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $this->mail->isSMTP(); // Send using SMTP
            $this->mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $this->mail->SMTPAuth = true; // Enable SMTP authentication
            $this->mail->Username = 'xestorgal@gmail.com'; // SMTP username
            $this->mail->Password = 'X3st0rg4l'; // SMTP password
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ),
            );
            $this->mail->SMTPSecure = 'ssl'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $this->mail->Port = 465; // TCP port to connect to
            //Recipients
            $this->mail->setFrom('xestorgal@gmail.com', $login);
            $this->mail->addAddress('xestorgal@gmail.com'); // Add a recipient
            $this->mail->addReplyTo('xestorgal@gmail.com', $login);

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = $asunto;
            $this->mail->Body = '<h2>From : ' . $login . "</h2><p>" . $contido . "</p>";
            $this->mail->AltBody = 'From : ' . $login . "\n" . $contido;

            if ($this->mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return "Non se puido enviar o correo. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
