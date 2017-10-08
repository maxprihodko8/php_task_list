<?php
return [
    'index' => 'site/index',
    'login' => 'site/login',

    'api/tasks' => 'api/tasks',
    'api/newtask' => 'api/newtask',
    'api/completetask/([0-9]+)' => 'api/completetask/$1',
];