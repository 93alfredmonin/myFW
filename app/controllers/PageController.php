<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of Page
 *
 * @author alfred
 */
class PageController extends AppController {

    public function viewAction() {
        // debug($this->route);
        $menu = $this->menu;
        $title = 'Страница';
        $this->set(compact('title', 'menu'));
    }

}
