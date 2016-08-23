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
        $link = Connect::getInstance()->getLink();
        $query = "SELECT id, name, href, parrent_id, css_class, title FROM Item_Menu;";
        $res = $link->query($query, PDO::FETCH_ASSOC);
        $menuArray = $res->fetchAll();
        $menu = new Menu($menuArray);

        //return $menu->getMenu();
    }
}