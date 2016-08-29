<?php
/**
 * Created by PhpStorm.
 * User: Егор
 * Date: 04.08.2016
 * Time: 22:26
 */


require_once 'classes/Autoload.php';
include 'html/header.php';
include 'html/content/main.php';
include 'html/menu.php';
include 'html/footer.php';


MainMenuInit::mainInit();
/*$a = new DB('user', 'password');
    if(!$connect = new PDO($a))
        throw new PDOException();*/
