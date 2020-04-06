<?php

$config = [
    'components' => [
        'cache' => 'classes\Cache',
        'test' => 'classes\Test',
    ],
];

spl_autoload_register(function($class) {
    $file =str_replace('\\', '/', $class) . '.php';

    if (is_file($file)) {
        require_once $file;
    }
});
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author alfred
 */
class Registry {

    public static $objects = [];
    protected static $instance;

    protected function __construct() {
        global $config;
        foreach ($config['components'] as $name =>$component){
            self::$objects[$name] = new $component;
        }
    }

    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function __get($name) {
      if(is_object(self::$objects[$name])){
          return self::$objects[$name];
      }
    }
    
    public function __set($name, $object) {
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $object;
        }
    }
    public function getList() {
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
    }

}

$app = Registry::instance();
//$app->getList();
$app->test->go();
$app ->test2 = 'classes\Test2';
$app->getList();
$app ->test2->hello();

