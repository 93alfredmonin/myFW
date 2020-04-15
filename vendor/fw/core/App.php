<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace fw\core;

use fw\core\ErrorHandler;
use fw\core\Registry;

/**
 * Description of App
 *
 * @author alfred
 */
class App {

    public static $app;

    public function __construct() {
        self::$app = Registry::instance();
        new ErrorHandler;
    }

}
