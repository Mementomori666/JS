<?php
/**
 * Created by PhpStorm.
 * User: driln
 * Date: 04.03.2016
 * Time: 15:44
 */

define("FILE_NAME", "../secure/.htpasswd");

function getHash($string, $salt, $iteration_count){
    for($i=0; $i< $iteration_count; $i++){
        $string = sha1($string.$salt);
    }
    return $string;
}

function saveHash($user, $hash, $salt, $iteration){
    $str = "$user:$hash:$salt:$iteration\n";
    if(file_put_contents(FILE_NAME, $str, FILE_APPEND)){
        return true;
    }
    else return false;
}

function userExists($login){
    if(!is_file(FILE_NAME)){
        return false;
    }
    $users = file(FILE_NAME);
    foreach($users as $user){
        if(strpos($user, $login) !== false){
            return $user;
        }

    }
    return false;
}

function logOut(){
    session_destroy();
    header("Location: http://".$_SERVER['HTTP_HOST']."/admin/secure/login.php");
    exit;
}