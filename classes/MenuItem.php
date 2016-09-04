<?php

/**
 * Created by PhpStorm.
 * User: driln
 * Date: 09.08.2016
 * Time: 15:42
 */
class MenuItem
{
    private $id;
    private $name;
    private $href;
    private $parentid;
    private $liClass;
    private $submenu = null;

    public function __construct($id, $name, $href, $parentid = null, $liClass = null, Menu $submenu = null){
        $this->id = $id;
        $this->name = $name;
        $this->href = $href;
        $this->parentid = $parentid;
        $this->liClass = $liClass;
        $this->submenu = $submenu;
    }

    public function getMenuItem(){
        $outStr = "";
        $outStr .= "<li";
        if($this->liClass != null) $outStr.=" class = '$this->liClass'";
        $outStr .= "><a href='/page/$this->href' target='_self'>
$this->name</a>";
        if(strstr($this->liClass, 'withsubmenu')) {
            //блок добавления подменю
            $outStr .= $this->submenu->getMenu();
        }
        $outStr.="</li>";
        return $outStr;
    }
}