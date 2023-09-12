<?php
require 'dbConnection.php';
require '../modules/PHPMailer/src/Exception.php';
require '../modules/PHPMailer/src/PHPMailer.php';
require '../modules/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email)
{
    $mail = new PHPMailer(true);
    // SE GENERA UN CODIGO ALEATORIO DE 6 DIGITOS
    $codigo = rand(100000, 999999);
    try {
        // PROCESO PARA ENVIAR EL MAIL CON EL CODIGO DE RECUPERACIÓN
        $mail->isSMTP();
        $mail->Host = 'smtp.outlook.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('fontalvo_js@ejemplo.com', 'WorkTest | Task Manager');
        $mail->addAddress($email, 'Usuario WorkTest');

        $mail->isHTML(true);
        $mail->Subject = 'Get your access code | WorkTest';
        $mail->Body = $codigo;

        $mail->send();
        return $codigo;
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
        return $mail->ErrorInfo;
    }
}
function verifyEmail($pdo)
{
    // SE VALIDA QUE EL EMAIL A RECUPERAR EXISTA
    $email = $_POST['email'];
    $sql = 'SELECT email FROM users WHERE email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($result['email'])) {
        $emailToSend = $result['email'];
        $response = sendEmail($emailToSend);
        if (!empty($response)) {
            $response = password_hash($response, PASSWORD_BCRYPT);
            // EN CASO DE EXISTIR RETORNA EL HASH DEL CODIGO QUE LUEGO SE VALIDARÁ CON LA ENTRADA DEL USUARIO Y JAVASCRIPT
            return ['status' => 200, 'code' => $response];
        } else {
            return ['status' => 500, 'message' => 'Internal error'];
        }
    } else {
        return ['status' => 404, 'message' => 'Email not found'];
    }
}
if (isset($_POST['email'])) {
    $response = verifyEmail($pdo);
    echo json_encode($response);
}
