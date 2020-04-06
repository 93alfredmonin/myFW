<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of App
 *
 * @author alfred
 */
class AppController extends \vendor\core\base\Controller {

    public $menu;
    public $meta = [];

    public function __construct($route) {
        parent::__construct($route);
//        if ($this->route['controller'] == 'Main' && $this->route['action'] == 'test') {
//            echo '<h1>TEST</h1>';
//        }
        new \app\models\Main;
        $this->menu = \R::findAll('category');
    }

    protected function setMeta($title = ' ', $desc = ' ', $keywords = ' ') {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}
