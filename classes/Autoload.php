<?php
spl_autoload_extensions('.php');
spl_autoload_register('loadClasses');

function loadClasses($className) {
    if (file_exists(ROOT_DIR  . 'controller'. DS . $className . '.php')) {
        require_once ROOT_DIR . 'controller' . DS. $className . '.php';
    } elseif (file_exists('model' . $className . '.php')) {
        require_once ROOT_DIR  . 'model' . DS . $className . '.php';
    } else {
        require_once ROOT_DIR . 'classes' . DS . $className . '.php';
    }
}