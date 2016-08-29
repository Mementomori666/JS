<?php

/**
 * Created by PhpStorm.
 * User: driln
 * Date: 09.08.2016
 * Time: 17:37
 */
class MainMenuInit {
    public static function mainInit() {
        $link = Connect::getInstance()->getLink();
        $query = '';
        $submenus = array();
        try {
            $query = "SELECT id, name, href, parent_id, css_class, title FROM Item_Menu;";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $res = $link->query($query, PDO::FETCH_ASSOC);
        $menuArray = $res->fetchAll();
        $structuredMenu = array();
        foreach ($menuArray as $menuItem) {
            $structuredMenu[$menuItem['parent_id']][] = $menuItem;
        }
        $parentIds = array_keys($structuredMenu);
        $parentIds = array_reverse($parentIds);
        foreach($parentIds as $id){
            $menuItem = array();
            foreach ($structuredMenu[$id] as $item) {
                unset($submenu);
                $submenu = null;
                if(array_key_exists($item['id'], $submenus)){
                    $submenu = $submenus[$item['id']];
                }
                $menuItem[$id][] = new MenuItem($item['id'], $item['name'], $item['href'], $item['parent_id'], $item['css_class'], $submenu);
            }
            $submenus[$id] = new Menu($menuItem);
        }
        $menu = $submenus[0];
        return $menu->getMenu();
    }
}