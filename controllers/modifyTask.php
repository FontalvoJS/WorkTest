<?php
require_once 'dbConnection.php';
require_once '../model/dbModel.php';
require_once 'dataSanitizer.php';
require 'sessionVerify.php';
$model = new taskManagerModel($pdo);
if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['post-id']) && isset($_POST['dateToFinishEdit'])) {
    $id = sanitizeInput($_POST['post-id']);
    $title = sanitizeInput($_POST['title']);
    $description = sanitizeInput($_POST['description']);
    $dateToFinish = sanitizeInput($_POST['dateToFinishEdit']);
    $resTasks = $model->modifyTask($id, $title, $description, $dateToFinish);
    echo $resTasks;
}
