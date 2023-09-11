<?php
require_once '../controllers/dbConnection.php';
$getTasks = "SELECT 
users.id AS user_id,
users.name AS user_name,
users.email AS user_email,
tasks.id AS task_id,
tasks.title AS task_title,
tasks.description AS task_description,
tasks.date_post AS task_date_post,
tasks.dateToFinish AS task_date_to_finish,
tasks.status AS task_status
FROM 
users 
LEFT JOIN 
tasks
ON users.id = tasks.id_user
WHERE tasks.status = 'finished'
ORDER BY 
users.id";
$result = $pdo->query($getTasks);
while ($row = $result->fetch()) {
    if (isset($row['task_status']) && !empty($row['task_status'])) {
?>
        <div class="card">
            <div class="card-body" style="    box-shadow: 0px 1px 7px 0px #4caf503b;
    border-bottom: 3px solid #4caf50;
">
                <span class="action_box finished_box">
                    <span title="Move to pending"><i class="fas fa-arrow-left" onclick="moveTo(<?php echo $row['task_id']; ?>,'pending')"></i></span>
                    <span title="Edit task"><i class="fas fa-edit" onclick="setIdToFormForModifyContent(event)" post-id="<?php echo $row['task_id']; ?>" data-bs-toggle="modal" data-bs-target="#modalEditProgress"></i></span>
                    <span title="Remove task"><i class="fas fa-trash" onclick="deleteTask(<?php echo $row['task_id']; ?>)"></i></span>

                </span>
                <h5 class="card-title"><?php echo $row['task_title']; ?>

                </h5>
                <p class="card-text"><?php echo $row['task_description']; ?></p>
                <a href="#" class="card-link"> <i class="fas fa-user"></i> <?php echo $row['user_name']; ?></a>
                <br>
                <a href="#" class="card-link"><i class="fas fa-hourglass-start" title="Started at" style="color: #4CAF50 !important;"></i> <?php echo $row['task_date_post']; ?></a>
                <br>
                <a href="#" class="card-link"><i class="fas fa-hourglass-end" title="Finish at" style="color: #4CAF50 !important;"></i> <?php echo $row['task_date_to_finish']; ?></a>
            </div>
        </div>
<?php
    }
}
?>