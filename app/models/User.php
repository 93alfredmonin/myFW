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

}
