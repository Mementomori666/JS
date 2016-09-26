<?php
/**
 * Created by PhpStorm.
 * User: driln
 * Date: 04.03.2016
 * Time: 13:41
 */

session_start();
if(!isset($_SESSION['admin'])){
    header("Location: http://".$_SERVER['HTTP_HOST']."/admin/view/login.php?ref=".$_SERVER['REQUEST_URI']);
    exit;
}