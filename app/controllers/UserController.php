<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use fw\core\base\View;
use app\models\User;

/**
 * Description of UserCotroller
 *
 * @author alfred
 */
class UserController extends AppController {

    public function signupAction() {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data)) {
                $user->getErros();
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'] , PASSWORD_DEFAULT);
            if ($user->save('user')) {
                $_SESSION['success'] = 'Вы успешно зарегистрированы';
            } else {
                $_SESSION['error'] = 'Ошибка попробуйте позже';
            }
            redirect();
        }
        View::setMeta('Регтстрация');
    }

    public function loginAction() {
        
    }

    public function logoutAction() {
        
    }

}
