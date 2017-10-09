<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 20:23
 */

namespace src\models\repository;


use src\models\Task;
use src\models\UserTask;
use PDO;

class TaskRepository
{
    private $pdo;

    /**
     * @var \PDO
     */
    private $pd;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param mixed $pdo
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTasks() {
        $query = $this->pdo->query('SELECT * from task');
        return $query->fetchAll(PDO::FETCH_CLASS, UserTask::class);
    }

    public function saveTask(UserTask $task) {
        $stmt = $this->pdo->prepare('INSERT INTO task (username, text, email, image) VALUES (:username, :text, :email, :image)');
        $stmt->bindParam(':username', $task->getUserName(), PDO::PARAM_STR);
        $stmt->bindParam(':text', $task->getText(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $task->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':image', $task->getImage(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function completeTask($id) {
        $stmt = $this->pdo->prepare('UPDATE task SET is_completed = 1 WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateTask(UserTask $task) {
        $stmt = $this->pdo->prepare('UPDATE task set username = :username, text = :text, email = :email, image = :image WHERE id = :id)');
        $stmt->bindParam(':id', $task->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':username', $task->getUserName(), PDO::PARAM_STR);
        $stmt->bindParam(':text', $task->getText(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $task->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':image', $task->getImage(), PDO::PARAM_STR);

        $stmt->execute();
        return;
    }
}