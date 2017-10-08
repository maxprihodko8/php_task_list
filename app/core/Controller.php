<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 18:45
 */

namespace app\core;



class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

}