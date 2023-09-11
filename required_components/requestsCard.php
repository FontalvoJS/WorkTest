<?php
require_once '../controllers/dbConnection.php';
require '../model/dbModel.php';
$model = new taskManagerModel($pdo);
$result = $model->getTasks();
while ($row = $result->fetch()) {
    if (isset($row['task_status']) && !empty($row['task_status'])) {
?>
        <div class="card">
            <div class="card-body" style="    box-shadow: 0px 1px 7px 0px #e91e6317;
    border-bottom: 3px solid #e91e63;">
                <span class="action_box">
                    <span title="Remove task"><i class="fas fa-trash" onclick="deleteTask(<?php echo $row['task_id']; ?>)"></i></span>
                    <span title="Edit task"><i class="fas fa-edit" onclick="setIdToFormForModifyContent(event)" post-id="<?php echo $row['task_id']; ?>" data-bs-toggle="modal" data-bs-target="#modalEdit"></i></span>
                    <span title="Move to pending"><i class="fas fa-arrow-right" onclick="moveTo(<?php echo $row['task_id']; ?>,'pending')"></i></span>
                </span>
                <h5 class="card-title"><?php echo $row['task_title']; ?>

                </h5>

                <p class="card-text"><?php echo $row['task_description']; ?></p>
                <a href="#" class="card-link"> <i class="fas fa-user"></i> <?php echo $row['user_name']; ?></a>
                <br>
                <a href="#" class="card-link"><i class="fas fa-hourglass-start" title=""></i> <?php echo $row['task_date_post']; ?></a>
                <br>
                <a href="#" class="card-link"><i class="fas fa-hourglass-end"></i> <?php echo $row['task_date_to_finish']; ?></a>
            </div>
        </div>
<?php
    }
}
?>