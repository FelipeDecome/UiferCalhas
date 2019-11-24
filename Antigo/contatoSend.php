<?php

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

require '../src/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.destaquedigital.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contato@uifercalhas.com.br';       // SMTP username
$mail->Password = 'uifercalhas';                      // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($data['mail'], $data['name']);
$mail->addReplyTo($data['mail'], $data['name']);

$mail->addAddress('contato@uifercalhas.com.br', 'uifercalhas');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $data['subject'];
$mail->Body = "<b>Nome:</b>{$data['name']}<br/><b>E-mail:</b>{$data['mail']}<br/><b>Telefone:</b>{$data['tel']}<br/><b>Mensagem:</b>{$data['mensagem']}<br/>";
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


if (isset($err) && $err != null) {
    echo "<script>location.href='index.php?send=fail&err=$err#contato';</script>";
} else {
    if ($mail->send()) {
        echo "<script>location.href='index.php?send=success#contato';</script>";
    } else {
        echo "<script>location.href='index.php?send=fail#contato';</script>"
    }
}
