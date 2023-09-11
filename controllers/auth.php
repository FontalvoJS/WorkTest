<?php
require_once 'dbConnection.php';
require_once 'dataSanitizer.php';
require_once '../model/dbModel.php';
$model = new taskManagerModel($pdo);
if (isset($_POST['email']) && isset($_POST['login']) && isset($_POST['password'])) {
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $resLogin =  $model->verifyUser($email, $password);
    echo $resLogin;
}
if (isset($_POST['email']) && isset($_POST['register']) && isset($_POST['password_verify'])) {
    $email = sanitizeInput($_POST['email']);
    $name = sanitizeInput($_POST['name']);
    $password = sanitizeInput($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $resRegister = $model->saveNewUser($email, $name, $password);
    echo $resRegister;
}
