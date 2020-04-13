<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers\admin;

use vendor\core\base\Controller;

/**
 * Description of AppController
 *
 * @author alfred
 */
class AppController extends Controller {

    public $layout = 'admin';

    public function __construct($route) {
        parent::__construct($route);
    }

}
