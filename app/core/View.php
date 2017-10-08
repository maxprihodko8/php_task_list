<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 18:46
 */

namespace app\core;


define('VIEWS_BASEDIR', ROOT .'/../src/views/');

class View {
    public function fetchPartial($template, $params = array()) {
        extract($params);
        ob_start();
        include VIEWS_BASEDIR . $template . '.php';
        return ob_get_clean();
    }

    public function renderPartial($template, $params = array()) {
        echo $this->fetchPartial($template, $params);
    }

    public function fetch($template, $params = array()) {
        $content = $this->fetchPartial($template, $params);
        return $this->fetchPartial('layout', array('content' => $content));
    }

    public function render($template, $params = array()) {
        echo $this->fetch($template, $params);
    }
}