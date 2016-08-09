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

    public function __construct($id, $name, $href, $parentid = null, $liClass = null){
        $this->id = $id;
        $this->name = $name;
        $this->href = $href;
        $this->parentid = $parentid;
        $this->liClass = $liClass;
    }

    public function getMenuItem(){
        $outStr = "";
        $outStr .= "<li";
        if($this->liClass != null) $outStr.=" class = '$this->liClass'";
        $outStr .= "><a class='active' href='$_SERVER[PHP_SELF]/$this->href.php' target='_self'>
$this->name</a>";
        if($this->liClass == "withsubmenu") {
            //блок добавления подменю
        }
        $outStr.="</li>";
        return $outStr;
    }
}