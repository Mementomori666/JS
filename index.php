<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
require_once 'config.php';

$controller = 'PageController';
$action = 'actionIndex';
$containerStyle = 'index';
$params = array();


/**сюда пихать все мета теги через .=
/* тогда они собираются из многих мест в одно и скопом выводятся
 */
$GLOBALS['headers'] = '';



if ($_SERVER['REQUEST_URI'] != '/') {
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uriParts = explode('/', trim($urlPath, ' /'));

    $controller = ucfirst(array_shift($uriParts)) . "Controller";
    if (count($uriParts) > 0) {
        $action = array_shift($uriParts);
        $containerStyle = $action;
        $actionArray = explode('-', $action);
        foreach($actionArray as $item) $item = ucfirst($item);
        $action = implode('', $actionArray);
    } else $action = "index";
    $action = "action" . ucfirst($action);
    for ($i = 0; $i < count($uriParts); $i++) {
        if(isset($uriParts[$i+1]))$params[$uriParts[$i]] = $uriParts[++$i];
        else $action = 'notFound';
    }
}
require_once 'classes/Autoload.php';
try {
    if(!class_exists($controller, true)) throw new Exception();
    $controllerClass = new $controller();
    if(!method_exists($controllerClass, $action)) throw new Exception();
    $content = $controllerClass->$action($params);
} catch (Exception $e) {
    $controller = 'PageController';
    $action = 'actionNotFound';
    $controllerClass = new $controller();
    $content = $controllerClass->$action($params);
}
$menu = View::renderPhpFile('menu');
$footer = View::renderPhpFile('footer');
$header = View::renderPhpFile('header',[
    'containerStyle' => $containerStyle,
    'menu' => $menu,
    'content' => $content,
    'footer' => $footer,
    'headers' => $GLOBALS['headers']
]);
echo $header;
ob_end_flush();