<?php

require 'rb.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass'], $options);
R::freeze(true);
R::fencyDebug(true);
////var_dump(R::testConnection());
////$cat = R::dispense('categiry');
////$cat->title ='Категория 2';
////$id = R::store($cat);
////var_dump($id);
////$cat = R::load('categiry', 2);
////echo $cat['title'];
//
///*$cat = R::load('category', 3);
//echo $cat->title . '<br>';
//
//$cat->title = 'Категория 3';
//R::store($cat);
//echo $cat->title . '<br>';*/
//
///*$cat = R::load('category', 3);
//R::trash($cat);*/

R::wipe('category');
