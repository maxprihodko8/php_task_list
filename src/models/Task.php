<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 19:50
 */

namespace models;


interface Task
{
    public function getUserName();
    public function setUserName($userName);

    public function getEmail();
    public function setEmail($email);

    public function getText();
    public function setText($text);

}