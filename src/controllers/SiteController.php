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
        $this->view->render('site/index');
    }

    public function actionLogin() {
        $credentials = include(ROOT . '/../app/config/password.php');
        if ($_POST['username'] ?? '' === $credentials['username'] ?? '' && $_POST['password'] ?? '' === $credentials['password'] ?? '') {
            setcookie("is_admin", true, time()+3600 * 24);
            header('Location: /index');
        }
        $this->view->render('site/login');
    }
}