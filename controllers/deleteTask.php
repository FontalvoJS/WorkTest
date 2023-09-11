<?php
require_once 'dbConnection.php';
require_once 'dataSanitizer.php';
require_once '../model/dbModel.php';
$model = new taskManagerModel($pdo);
require 'sessionVerify.php';
$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = sanitizeInput($_POST['id']);
    $resLogin =  $model->deleteTask($id);
    echo $resLogin;
}
