<?php
/**
 * Created by PhpStorm.
 * User: driln
 * Date: 04.03.2016
 * Time: 16:14
 */
Header("Content-Type: text/html;charset=UTF-8");
//require_once "session.php";
require_once "secure.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Хеширование SHA-1</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>

<body>
<h1>Хеширование SHA-1</h1>

<?
$user = "";
$string = "";
$salt = "";
$iteration_count = 100;
$result = '';

if (!$salt)
    $salt = str_replace('=', '', base64_encode(md5(microtime() . '2fb65ad665a049ef414bf8e171cef0f7')));

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $user = $_POST['user'] ? $_POST['user'] : $user;
    if(!userExists($user)){
        $error = 0;
        $_POST['string'] ? $string = $_POST['string'] : $error=1;
        $_POST['salt'] ? $salt = $_POST['salt'] : $salt = $salt;
        $_POST['n'] ? $iteration_count = (int) $_POST['n'] : $error=1;
        $result = getHash($string, $salt, $iteration_count);
        if(saveHash($user, $result, $salt, $iteration_count))
            $result = 'Хеш '. $result. ' успешно добавлен в файл';
        else
            $result = 'При записи хеша '. $result. ' произошла ошибка';
    }else{
        $result = "Пользователь $user уже существует. Выберите другое имя.";
    }
    if($error) echo "Заполните обязательные поля";

}
?>
<h3><?= $result?></h3>
<form action="<?= $_SERVER['PHP_SELF']?>" method="post">
    <div>
        <label for="txtUser">Логин</label>
        <input id="txtUser" type="text" name="user" value="<?= $user?>" style="width:40em"/>
    </div>
    <div>
        <label for="txtString">Пароль</label>
        <input id="txtString" type="text" name="string" value="<?= $string?>" style="width:40em"/>
    </div>
    <div>
        <label for="txtSalt">Соль</label>
        <input id="txtSalt" type="text" name="salt" value="<?= $salt?>"  style="width:40em"/>
    </div>
    <div>
        <label for="txtIterationCount">Число иттераций</label>
        <input id="txtIterationCount" type="text" name="n" value="<?= $iteration_count?>"  style="width:4em"/>
    </div>
    <div>
        <button type="submit">Создать</button>
    </div>
</form>
</body>
</html>