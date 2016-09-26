<?php
/**
 * Created by PhpStorm.
 * User: driln
 * Date: 25.02.2016
 * Time: 13:34
 */
session_start();
ob_start();
$controller = 'PageController';
$action = 'actionAddArticle';
$containerStyle = 'login';
$params = array();

if ($_SERVER['REQUEST_URI'] != '/admin/') {
   $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
   $urlPath = explode('admin', $urlPath)[1];
   $uriParts = explode('/', trim($urlPath, '/'));
   $controller = ucfirst(array_shift($uriParts)) . "Controller";

   if (count($uriParts) > 0) {
      $action = $uriParts[0];
      $containerStyle = $action;
      $actionArray = explode('-', $action);
      foreach($actionArray as &$item) $item = ucfirst($item);
      $action = implode('', $actionArray);
   } else $action = "addArticle";
   $action = "action" . ucfirst($action);
   for ($i = 0; $i < count($uriParts); $i++) {
      $params[$uriParts[$i]] = $uriParts[++$i];
   }
}
require_once "secure/session.php";
require_once "secure/secure.php";
require_once "classes/Autoload.php";
require_once "html/header.php";
require_once "html/menu.php";
try {
   if(!class_exists($controller, true)) throw new Exception();
   $controllerClass = new $controller();
   if(!method_exists($controllerClass, $action)) throw new Exception();
   $controllerClass->$action($params);
} catch (Exception $e) {
   $controller = 'PageController';
   $action = 'actionNotFound';
   $controllerClass = new $controller();
   $controllerClass->$action($params);
   var_dump($controllerClass);
}


include "html/footer.php";