<?php

namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use fw\libs\Pagenation;

/**
 * Description of Main
 *
 * @author alfred
 */
class MainController extends AppController {

    public function indexAction() {

//// create a log channel
//        $log = new Logger('name');
//        $log->pushHandler(new StreamHandler(ROOT . '/tmp/your.log', Logger::WARNING));
//
// // add records to the log
//        $log->warning('Foo');
//        $log->error('Bar');
//
//
//
//// Instantiation and passing `true` enables exceptions
//        $mail = new PHPMailer(true);
//       // var_dump($mail);

        $model = new Main;
        $total = \R::count('posts');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        
        
        $pagenation = new Pagenation($page, $perpage, $total);
        $start = $pagenation->getStart();
        
        
        $posts = \R::findAll('posts', "LIMIT $start,$perpage");
        $post = \R::findOne("posts", "id = 1");
        //$pagenation= new Pagenation;
        $menu = $this->menu;
        $title = 'PAGE TITLE';
        View::setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'posts', 'menu', 'meta', 'pagenation','total'));
    }

    public function testAction() {
        if ($this->isAjax()) {
            $model = new Main();
//            $data = ['answer' => 'ответ с сервера', 'code' => 200];
//            echo json_encode($data);

            $post = \R:: findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));

            die;
        }
        echo '222';
        $this->layout = 'test';
    }

}
