<?php
require '../model/dbModel.php';

function getTasks($tipo, $pdo)
{
    require 'dbConnection.php';
    $model = new taskManagerModel($pdo);
    switch ($tipo) {
        case 'standby':
            $result = $model->getTasks('standby');
            return $result;
            break;
        case 'finished':
            $result = $model->getTasks('finished');
            return $result;
            break;
        case 'pending':
            $result = $model->getTasks('pending');
            return $result;
            break;
    }
}
