<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers\admin;

use vendor\core\base\View;

/**
 * Description of UserController
 *
 * @author alfred
 */
class UserController extends AppController {
    public $layout = 'default';

    public function indexAction() {
        View::setMeta('Админка :: Главная страница', 'Описание админки', 'Ключевые слова админки');
        $test = 'test var';
        $data = ['test', '2'];
//        $this->set([
//            'test'=>$test,
//            'data'=>$data,
//        ]);
        $this->set(compact('test', 'data'));
    }

    public function testAction() {
        $this->layout = 'admin';
    }

}
