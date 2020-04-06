<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\core\base;

/**
 * Description of View
 *
 * @author alfred
 */
class View {

    public $route = [];
    public $view;
    public $layout;
    public $scripts = [];
    public static $meta = ['title' => ' ', 'desc' => ' ', 'keywords' => ' '];

    public function __construct($route, $layout = ' ', $view = ' ') {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }

        $this->view = $view;
    }

    public function render($vars) {
        if (is_array($vars))
            extract($vars);
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "<p>Не найден вид <b>$file_view</b></p>";
        }
        $content = ob_get_clean();


        if (false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                $content = $this->getScripts($content);
                $scripts = [];
                if (!empty($this->scripts[0])) {
                    $scripts = $this->scripts[0];
                }
                //debug($scripts);
                require $file_layout;
            } else {
                echo "<p>Не найден шаблн <b>$file_layout</b></p>";
            }
        }
    }

    protected function getScripts($content) {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if (!empty($this->scripts)) {
            $content = preg_replace($pattern, ' ', $content);
        }
        return$content;
    }

    public static function getMeta() {
        echo '<title>' . self::$meta['title'] . '</title>';
        echo '<meta name = "description" content = "' . self::$meta['desc'] . '"';
        echo '<meta name = "keywords" content = "' . self::$meta['keywords'] . '"';
    }

    public static function setMeta($title = ' ', $desc = ' ', $keywords = ' ') {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }

}
