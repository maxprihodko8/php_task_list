<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 18:45
 */

namespace app\core;


use app\core\DatabaseConnector;

class Controller
{
    protected $view;
    protected $pdo;

    public function __construct()
    {
        $this->view = new View();

        $databaseConnector = new DatabaseConnector();
        $this->pdo = $databaseConnector->getConnection();
    }

}