<?php
$_POST = json_decode(file_get_contents('php://input'), true);
require_once 'dbConnection.php';
require_once '../model/dbModel.php';
require_once 'dataSanitizer.php';
require 'sessionVerify.php';
$model = new taskManagerModel($pdo);
if (isset($_POST['id']) && isset($_POST['moveTo'])) {
    $id = sanitizeInput($_POST['id']);
    $move = sanitizeInput($_POST['moveTo']);
    $resTask =  $model->moveTo($id, $move);
    echo $resTask;
}
