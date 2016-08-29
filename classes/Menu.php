<?php

/**
 * Created by PhpStorm.
 * User: driln
 * Date: 09.08.2016
 * Time: 17:26
 */
class Menu {
    private $menuItems = array();

    public function __construct(array $menuItems) {
        $this->menuItems = array_pop($menuItems);
    }

    public function getMenu() {
        $outStr = "<ul>";
        foreach ($this->menuItems as $item) {
            //var_dump($item);
            $outStr .= $item->getMenuItem();
        }
        $outStr .= "</ul>";
        return $outStr;
    }
}