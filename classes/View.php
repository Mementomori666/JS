<?php


class View {
    public static function renderPhpFile($file, array $params = []){
        extract($params, EXTR_OVERWRITE);
        ob_start();
        ob_implicit_flush(false);
        require(ROOT_DIR."view".DS.$file.".php");
        return ob_get_clean();
    }

    public static function render($file, array $params = []){
        echo self::renderPhpFile($file, $params);
    }
}