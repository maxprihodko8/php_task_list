<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 20:43
 */

namespace src\controllers;

use app\core\Controller;
use src\models\repository\TaskRepository;
use src\models\UserTask;

class ApiController extends Controller
{
    public function actionTasks()
    {
        $taskRepository = new TaskRepository($this->pdo);
        $tasks = $taskRepository->getAllTasks();
        return json_encode($tasks);
    }

    public function actionNewtask() {
        $params = json_decode(file_get_contents('php://input'),true);
        $task = new UserTask();
        $task->setUserName($params['username']);
        $task->setText($params['text']);
        $task->setEmail($params['email']);
        $taskRepository = new TaskRepository($this->pdo);
        var_dump($taskRepository->saveTask($task));
    }
}