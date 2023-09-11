<?php
require_once 'dbConnection.php';
require_once 'dataSanitizer.php';
require_once '../model/dbModel.php';
$model = new taskManagerModel($pdo);
require 'sessionVerify.php';
if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['user'])) {

    $id = NULL;
    $date = date('Y-m-d H:i:s');
    $name = sanitizeInput($_POST['title']);
    $id_user = sanitizeInput($_POST['user']);
    $description = sanitizeInput($_POST['description']);
    $dateToFinish = sanitizeInput($_POST['dateToFinish']);
    $status = isset($_POST['autoProgress']) && !empty($_POST['autoProgress']) ? 'pending' : 'standby';
    $status = sanitizeInput($status);
    $resTask =  $model->saveTasks($id, $id_user, $name, $description, $date, $dateToFinish, $status);
    echo $resTask;
}
