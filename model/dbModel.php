<?php
class taskManagerModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function verifyUser($email, $password)
    {
        session_start();
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $data['password'])) {
                if (isset($_POST['rememberme'])) {
                    setcookie('token', uniqid(), time() + (86400 * 30), "/");
                    $_SESSION['user'] = [
                        'name' => $data['name'],
                        'id' => $data['id']
                    ];
                    return json_encode(['status' => 200]);
                } else {
                    $_SESSION['user'] = [
                        'name' => $data['name'],
                        'id' => $data['id']
                    ];
                    return json_encode(['status' => 200]);
                }
            } else {
                $err = ['status' => "incorrect password"];
                return json_encode($err);
            }
        } else {
            $err = ['status' => 404];
            return json_encode($err);
        }
    }

    public function saveNewUser($email, $name, $password)
    {
        $id = NULL;
        $date = date('Y-m-d h:i:s');
        $query = "INSERT INTO users (id,name,email, password,date_created) VALUES (:id,:name, :email, :password, :date)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return json_encode(['status' => 200]);
        } else {
            $err = ['status' => 404];
            return json_encode($err);
        }
    }
    public function deleteTask($id)
    {
        $query = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return json_encode(['status' => 200]);
        } else {
            $err = ['status' => 404];
            return json_encode($err);
        }
    }
    public function modifyTask($id, $name, $description, $dateToFinish)
    {
        $query = "UPDATE tasks SET description=:description, title=:title, dateToFinish=:dateToFinishEdit WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':title', $name);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':dateToFinishEdit', $dateToFinish);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return json_encode(['status' => 200]);
        } else {
            $err = ['status' => 404];
            return json_encode($err);
        }
    }
    public function moveTo($id, $move)
    {
        $query = "UPDATE tasks SET status=:status WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $move);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return json_encode(['status' => 200]);
        } else {
            $err = ['status' => 404];
            return json_encode($err);
        }
    }
    public function saveTasks($id, $id_user, $name, $description, $date, $dateToFinish, $status)
    {
        $query = "INSERT INTO tasks (id,id_user,title,description,status,date_post,dateToFinish) VALUES (:id,:id_user,:title, :description, :status, :date, :dateToFinish)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':title', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':dateToFinish', $dateToFinish);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return json_encode(['status' => 200]);
        } else {
            $err = ['status' => 404];
            return json_encode($err);
        }
    }
    public function getTasks($type)
    {
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
        WHERE tasks.status = :type
        ORDER BY 
        users.id";
        $result = $this->pdo->prepare($getTasks);
        $result->bindParam(':type', $type);
        $result->execute();
        return $result;
    }
}
