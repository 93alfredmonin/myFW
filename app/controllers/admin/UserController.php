<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers\admin;

use fw\core\base\View;

/**
 * Description of User
 *
 * @author alfred
 */
class UserController extends AppController {
    
    public function indexAction() {
        View::setMeta('Админка :: Главная страница', 'Описание админки', 'Ключевики админки');
        $test = 'test var';

        $data = ['svdsdv', 159];

        $this->set(compact('test', 'data'));
    }

    public function testAction() {
        
    }

}
