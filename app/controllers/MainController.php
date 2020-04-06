<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;
use vendor\core\base\View;

/**
 * Description of Main
 *
 * @author alfred
 */
class MainController extends AppController {

    public function indexAction() {
        $model = new \app\models\Main;
        $posts = \R::findAll('posts');
        $post = \R::findOne("posts", "id = 1");
        $menu = $this->menu;
        $title = 'PAGE TITLE';
        View::setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    public function testAction() {
        if ($this->isAjax()) {
            $model = new Main();
            $post = \R:: findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));

            die;
        }
        echo '222';
        $this->layout = 'test';
    }

}
