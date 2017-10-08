<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 19:56
 */

namespace app\core;


class DatabaseConnector
{
    private $connection;

    public function getConnection() {
        if (!empty($this->connection)) {
            return $this->connection;
        }
        if (file_exists(ROOT . '/../app/config/database.php')) {
            $config = include(ROOT . '/../app/config/database.php');
            return $this->connection = new \PDO(
                $config['hostname'],
                $config['username'],
                $config['password'],
                $config['options'] ?? []
            );
        }
    }
}