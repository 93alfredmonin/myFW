<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\libs;

/**
 * Description of Cache
 *
 * @author alfred
 */
class Cache {

    public function __construct() {
        
    }

    public function set($key, $data, $seconds = 3600) {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        if (file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))) {
            return true;
        }
        return false;
    }

    public function get($key) {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content ['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key) {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }

}
