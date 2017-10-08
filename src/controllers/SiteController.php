<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 18:44
 */

namespace src\controllers;


use app\core\Controller;
use src\models\repository\TaskRepository;

class SiteController extends Controller
{
    public function actionIndex() {
        $taskRepository = new TaskRepository($this->pdo);
        $tasks = $taskRepository->getAllTasks();
        $this->view->render('site/index');
    }
}