<?php
$root_dir = 'admin';
define('DS', DIRECTORY_SEPARATOR);
define ('ROOT_DIR', explode($root_dir, __DIR__)[0].$root_dir.DS);


spl_autoload_extensions('.php');
spl_autoload_register('loadClasses');

function loadClasses($className) {
    if (file_exists(ROOT_DIR  . 'controller'. DS . $className . '.php')) {
        require_once ROOT_DIR . 'controller' . DS. $className . '.php';
    } elseif (file_exists('model' . $className . '.php')) {
        require_once ROOT_DIR  . 'model' . DS . $className . '.php';
    }elseif (file_exists('secure' . $className . '.php')) {
        require_once ROOT_DIR  . 'secure' . DS . $className . '.php';
    } else {
        require_once ROOT_DIR . 'classes' . DS . $className . '.php';
    }
}
