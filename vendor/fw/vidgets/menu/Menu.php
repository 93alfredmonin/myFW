<?php

namespace fw\vidgets\menu;

use fw\libs\Cache;

class Menu {

    protected $data;
    protected $tree;
    protected $menuHTML;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'categories';
    protected $cache = 3600;
    protected $cacheKey = 'fw_menu';

    public function __construct($options = []) {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options) {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function output() {
        echo "<{$this->container} class ='{$this->class}'>";
        echo $this->menuHTML;
        echo "</{$this->container}>";
    }

    public function run() {
        $cache = new Cache();
        if (!$this->menuHTML) {
            $this->menuHTML = $cache->get($this->cacheKey);
            $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            $this->tree = $this->getTree();
            $this->menuHTML = $this->getMenuHtml($this->tree);
            $cache->set($this->cacheKey, $this->menuHTML, $this->cache);
        }
        $this->output();
    }

    protected function getTree() {
        $tree = [];
        $data = $this->data;

        foreach ($data as $id => &$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }

        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ' ') {
        $str = ' ';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTamplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTamplate($category, $tab, $id) {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}
