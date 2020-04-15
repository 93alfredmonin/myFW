<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace fw\core\base;

/**
 * Description of db
 *
 * @author alfred
 */
class Db {

    use \fw\core\TSingletone;

    protected $pdo;
//    protected static $instance;
    public static $countSql = 0;
    public static $queries;

    protected function __construct() {
        $db = require ROOT . '/config/config_db.php';
        require LIBS . '/rb.php';
        \R::setup('mysql:host=localhost;dbname=fw', 'root', '11111111');
        \R::freeze(true);
    }

}
