<?php
// application/PHPMailerConfig.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once FCPATH . 'phpMailer/src/PHPMailer.php';
require_once FCPATH . 'phpMailer/src/SMTP.php';
require_once FCPATH . 'phpMailer/src/Exception.php';

class PHPMailerConfig {
    public static function getMailer() {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 2;  // Enable verbose debug output
            $mail->isSMTP();  // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;  // Enable SMTP authentication
            $mail->Username = 'luhdeananda9@gmail.com';  // SMTP username
            $mail->Password = 'lrnt yprn vxqo fpez';  // SMTP password
            $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;  // TCP port to connect to

            // Recipients
            $mail->setFrom('luhdeananda9@gmail.com', 'Verification Email');

            return $mail;
        } catch (Exception $e) {
            return null;
        }
    }
}
?>
