<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

if (isset($_POST['send'])) {

    $data['name'] = (isset($_POST['name'])) ? $_POST['name'] : null;
    $data['mail'] = (isset($_POST['mail'])) ? $_POST['mail'] : null;
    $data['tel'] = (isset($_POST['tel'])) ? $_POST['tel'] : null;
    $data['pessoa'] = (isset($_POST['pessoa'])) ? $_POST['pessoa'] : null;
    $data['cpfcnpj'] = (isset($_POST['cpfcnpj'])) ? $_POST['cpfcnpj'] : null;
    $data['data'] = (isset($_POST['data'])) ? $_POST['data'] : null;
    $data['subject'] = (isset($_POST['subject'])) ? $_POST['subject'] : null;

    require '../src/system/class/ValidaDados.class.php';

    $valid = new ValidaDados($data['name'], $data['mail'], $data['tel'], $data['pessoa'], $data['cpfcnpj'], $data['data'], $data['subject']);
    $data = $valid->Result;

    $data['mensagem'] = (isset($_POST['mensagem'])) ? $_POST['mensagem'] : null;

    if ($data['name'] == false) {
        if (isset($err) && $err != null) {
            $err = "$err/name";
        } else {
            $err = "name";
        }
    }

    if ($data['mail'] == false) {
        if (isset($err) && $err != null) {
            $err = "$err/mail";
        } else {
            $err = "mail";
        }
    }

    if ($data['tel'] == false) {
        if (isset($err) && $err != null) {
            $err = "$err/tel";
        } else {
            $err = "tel";
        }
    }

    if ($data['subject'] == false) {
        if (isset($err) && $err != null) {
            $err = "$err/subject";
        } else {
            $err = "subject";
        }
    }

    if ($data['mensagem'] == "" || empty($data['mensagem'])) {
        if (isset($err) && $err != null) {
            $err = "$err/mens";
        } else {
            $err = "mens";
        }
    }
}

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.destaquedigital.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contato@uifercalhas.com.br';                     // SMTP username
    $mail->Password   = 'uifercalhas';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($data['mail'], $data['name']);
    $mail->addAddress('contato@uifercalhas.com.br', 'Uifer Calhas');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($data['mail'], $data['name']);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "<b>Nome:</b>{$data['name']}<br/><b>E-mail:</b>{$data['mail']}<br/><b>Telefone:</b>{$data['tel']}<br/><b>Mensagem:</b>{$data['mensagem']}<br/>";
    $mail->AltBody = "Nome: {$data['name']} | E-mail: {$data['mail']} | Telefone: {$data['tel']} | Mensagem: {$data['mensagem']}";

    if (isset($err) && $err != null) {
        echo "<script>location.href='index.php?send=fail&err=$err#contato';</script>";
    }

    $mail->send();
    //echo 'Message has been sent';    

} catch (Exception $e) {
    //echo "<script>location.href='../view/index.php?send=fail#contato';</script>";
    echo $e->getMessage();
}