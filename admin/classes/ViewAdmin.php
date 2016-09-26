<?php


class ViewAdmin {
    public static function render($file, array $params = []){
        extract($params, EXTR_OVERWRITE);
        require(ROOT_DIR."view".DS.$file.".php");
    }
}