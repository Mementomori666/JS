<?php
//require_once '../classes/Connect.php';
//include_once 'classes/JSCSql.php';
include_once 'classes/Autoload.php';

echo <<<ENDH
<form method="post">
   <input type="text" name="name">
   <label>name</label><br/>
   <input type="text" name="href">
   <label>href</label><br/>
   <input type="text" name="parent_id">
   <label>parent_id</label><br/>
   <input type="text" name="css_class">
   <label>css_class</label><br/>
   <input type="text" name="title">
   <label>title</label><br/>
   </fieldset>
   <input type="submit" name="add">
   <button type="submit" name="check">Проверить</button>
   <button type="submit" name="create">Создать</button>
   <button type="submit" name="del">Удалить</button>
   
</form>
ENDH;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $jscientia = new JSCSql();
   /**
    * Добавления новых ссылок в БД в случаи необходимости
    */
   if (isset($_POST['add'])) {
      $addArr = array();
      $addArr['name'] = $_POST['name'];
      $addArr['href'] = $_POST['href'];
      $addArr['parent_id'] = $_POST['parent_id'];
      $addArr['css_class'] = $_POST['css_class'];
      $addArr['title'] = $_POST['title'];
      $jscientia->SetLinks($addArr);

   }
   /**
    *Перенос данных из файла .htmenu в БД при нажатиии на кнопку создать
    */
   if (isset($_POST['create'])) {
      try {
         $sqlArr = array();
         $arrLink = file('.htmenu');

         if (!is_array($arrLink)) {
            throw new Exception ("Не удалось открыть файл");
         }

         foreach ($arrLink as $index) {

            list($id, $name, $href, $parent_id, $css_class) = explode(';', $index);
            $resArr['name'] = $name;
            $resArr['href'] = $href;
            $resArr['parent_id'] = $parent_id;
            $resArr['css_class'] = $css_class;
            $resArr['title'] = $name;
            $sqlArr[] = $resArr;
         }

         $jscientia->SetLinks($sqlArr);
         AddTablesArch::addTables();
      } catch (Exeption $e) {
         echo $e->getMessage();
      }
   }

}
if (isset($_POST['del'])) {
   AddTablesArticleAuthor::down();
}
/**
 * Проверка успешного создания БД
 */
if (isset($_POST['check'])) {
   $check = $jscientia->GetLinks();
  foreach ($check as $links)
     var_dump($links);

}

