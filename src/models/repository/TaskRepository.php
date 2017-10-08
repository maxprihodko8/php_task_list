<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 20:23
 */

namespace src\models\repository;


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
}