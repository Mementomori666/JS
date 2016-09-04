<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once 'classes/Autoload.php';
include 'html/header.php';

$controller = 'PageController';
$action = 'actionIndex';

$params = array();

if ($_SERVER['REQUEST_URI'] != '/') {
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uriParts = explode('/', trim($urlPath, ' /'));

    $controller = ucfirst(array_shift($uriParts)) . "Controller";
    if (count($uriParts) > 0) {
        $action = array_shift($uriParts);
        $actionArray = explode('-', $action);
        foreach($actionArray as $item) $item = ucfirst($item);
        $action = implode('', $actionArray);
    } else $action = "index";
    $action = "action" . ucfirst($action);

    for ($i = 0; $i < count($uriParts); $i++) {
        $params[$uriParts[$i]] = $uriParts[++$i];
    }
}

try {
    $controllerClass = new $controller();
    $controllerClass->$action($params);
} catch (Exception $e) {
    $controller = 'PageController';
    $action = 'actionNotFound';
    $controllerClass = new $controller();
    $controllerClass->$action($params);
}

include 'html/menu.php';
include 'html/footer.php';