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

class ApiController extends Controller
{
    public function actionTasks()
    {
        $taskRepository = new TaskRepository($this->pdo);
        $tasks = $taskRepository->getAllTasks();
        return json_encode($tasks);
    }
}