<?php
$root_dir = 'jscientia';
define ('ROOT_DIR', explode($root_dir, __DIR__)[0].$root_dir.'/');
define('DS', DIRECTORY_SEPARATOR);

spl_autoload_extensions('.php');
spl_autoload_register('loadClasses');

function loadClasses($className) {
    if (file_exists(ROOT_DIR . DS . 'controller/' . $className . '.php')) {
        set_include_path(ROOT_DIR . DS . 'controller' . DS);
        spl_autoload($className);
    } elseif (file_exists('model/' . $className . '.php')) {
        set_include_path(ROOT_DIR . DS . 'model' . DS);
        spl_autoload($className);
    } else {
        set_include_path(ROOT_DIR . DS . 'classes' . DS);
        spl_autoload($className);
    }
}