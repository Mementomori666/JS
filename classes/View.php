<?php
define('ROOT_DIR', __DIR__);
define('DS', DIRECTORY_SEPARATOR);

class View {
    public static function render($file, array $params = []){
        ob_start();
        ob_implicit_flush(false);
        extract($params, EXTR_OVERWRITE);
        require(ROOT_DIR.DS."view".DS.$file."php");
        return ob_get_clean();
    }
}