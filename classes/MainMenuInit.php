<?php

/**
 * Created by PhpStorm.
 * User: driln
 * Date: 09.08.2016
 * Time: 17:37
 */

class MainMenuInit
{
    public static function mainInit(){
        $link = \Connect::getInstance()->getLink();
        $query = '';
        $menuItem = array();
        $menuInStr = '';
        try {
            $query = "SELECT id, name, href, parent_id, css_class, title FROM Item_Menu;";
        }catch (Exception $e){
            echo $e->getMessage();
        }
        $res = $link->query($query, PDO::FETCH_ASSOC);
        $menuArray = $res->fetchAll();
        $structuredMenu = array();
        foreach($menuArray as $menuItem){
            $structuredMenu[$menuItem['parent_id']][] = $menuItem;
        }
        $parentIds = array_keys($structuredMenu);
        for($i = count($parentIds); $i > 0 ; $i--){
            if($parentIds[$i] != 0) {
                foreach($structuredMenu[$parentIds[$i]] as $item){
                    $menuItem[$parentIds[$i]][] = new MenuItem($item['id'], $item['name'], $item['href'], $item['parent_id'], $item['css_class']);
                }
                $submenus[$parentIds[$i]] = new Menu($menuItem);
            }
        }
//        echo '<pre>';
//        var_dump($menu);
//        echo '</pre>';
        //return $menu->getMenu();
    }
}