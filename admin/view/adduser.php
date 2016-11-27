<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 24.09.2016
 * Time: 0:42
 */
Header("Content-Type: text/html;charset=UTF-8");
require_once "secure/secure.php";
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
      $result = getHash($string, $salt, $iteration_count);
      if(saveHash($user, $result, $salt, $iteration_count))
         $result = 'Пользователь'. $user. ' успешно добавлен';
      else
         $result = 'При записи хеша '. $result. ' произошла ошибка';
   }else{
      $result = "Пользователь $user уже существует. Выберите другое имя.";
   }
   if($error) echo "Заполните обязательные поля";

}

?><div id="Form" class="container">

   <form class="form-horizontal"action="/admin/page/add-user" method="post">
   <div class="form-group">
      <label for="txtUser" class="col-md-2 control-label">Логин</label>
      <div class="col-md-6">
        <input id="txtUser" type="text" name="user" value="<?= $user?>" class="form-control"/>
      </div>
   </div>
   <div class="form-group">
      <label for="txtString" class="col-md-2 control-label">Пароль</label>
      <div class="col-md-6">
        <input id="txtString" type="text" class="form-control" name="string" value="<?= $string?>" style="width:40em"/>
      </div>
   </div>
      <div class="form-group">
               <div class="col-md-2 col-md-offset-4">
                  <button type="submit" class="btn btn-success btn-block">Создать</button>
               </div>

      </div>


      </form>
   </div>
<?
echo $result;
?>
