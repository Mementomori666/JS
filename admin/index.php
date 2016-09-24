<?php
/**
 * Created by PhpStorm.
 * User: driln
 * Date: 25.02.2016
 * Time: 13:34
 */
session_start();
ob_start();
require_once "secure/session.php";
require_once "secure/secure.php";
require_once "header.php";
require_once "menu.php";

switch ($_GET["page"]){
   case "addArticle": include "addArticle.php";
      break;
   case "adduser": include "adduser.php";
      break;
}