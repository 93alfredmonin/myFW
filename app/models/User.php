<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use fw\core\base\Model;

/**
 * Description of User
 *
 * @author alfred
 */
class User extends Model {

    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
    ];
    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ],
    ];

    public function checkUnique() {
        $user = \R::findOne('user', 'login = ? OR email = ? LIMIT 1', [$this->attributes['login'], $this->attributes['email']]);
        if ($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['unique'] [] = 'Этот логин уже занят';
            }
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'] [] = 'Этот email уже занят';
            }
            return false;
        }
        return true;
    }

    public function login() {
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if ($login && $password) {
            $user = \R::findOne('user', 'login = ?  LIMIT 1', [$login]);
            if ($user) {
                if (password_verify($password, $user->password)) {
                    foreach ($user as $k => $v) {
                        if ($k != 'password') {
                            $_SESSION ['user'][$k] = [$v];
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }

}
