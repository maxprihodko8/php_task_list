<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 20:43
 */

namespace src\controllers;

use app\core\Controller;
use src\models\ImageHandler;
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
        $task = new UserTask();
        $task->setUserName($_POST['username']);
        $task->setText($_POST['text']);
        $task->setEmail($_POST['email']);

        if (!empty($_FILES['image'])) {
            $imageHandler = new ImageHandler();
            $task->setImage($imageHandler->saveImage($_FILES['image']));
        }

        $taskRepository = new TaskRepository($this->pdo);
        $taskRepository->saveTask($task);
    }

    public function actionCompletetask($id) {
        $taskRepository = new TaskRepository($this->pdo);
        var_dump($taskRepository->completeTask($id));
    }
}