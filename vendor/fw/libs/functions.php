<?php

function debug($arr) {
    echo'<pre>' . print_r($arr, true) . '</pre>';
}

function redirect($http = false) {
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    }
    header("Location: $redirect");
    die;
}
