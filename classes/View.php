<?php


class View {
    public static function render($file, array $params = []){
        extract($params, EXTR_OVERWRITE);
        require(ROOT_DIR.DS."view".DS.$file.".php");
    }
}