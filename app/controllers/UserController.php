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
            if (!$user->validate($data) || !$user->checkUnique() ) {
                $user->getErros();
                $_SESSION['form_data'] = $data;
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
        if(!empty($_POST)){
            $user = new User;
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизованы';
            } else{
                 $_SESSION['error'] = 'Логин/пароль введены не верно';
            }
            redirect('/');
        }
        View:: setMeta('Вход');
    }

    public function logoutAction() {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            redirect('/user/login');
        }
    }

}
