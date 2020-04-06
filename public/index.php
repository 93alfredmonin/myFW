<?php

error_reporting(-1);

use vendor\core\Router;

$query = rtrim($_SERVER['REQUEST_URI'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT', 'default');
define('LIBS', dirname(__DIR__) . '/vendor/libs');
define('CACHE', dirname(__DIR__) . '/tmp/cache');



require '../vendor/libs/functions.php';


spl_autoload_register(function($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';

    if (is_file($file)) {
        require_once $file;
    }
});

new vendor\core\App;

Router::add('^/page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^/page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');



Router::dispetch($query);
