<?
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 13.08.2016
 * Time: 16:06
 */
require_once '../classes/JSCSql.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
   $jscientia = new JSCSql();
   if(isset($_POST['add'])){
      $addArr = array();
      $addArr['name'] = $_POST['name'];
      $addArr['href']= $_POST['href'];
      $addArr['parrent_id'] = $_POST['parrent_id'];
      $addArr['css_class'] = $_POST['css_class'];
      $addArr['title'] = $_POST['title'];
      $jscientia->SetLinks($addArr);
      
     }
   if (isset($_POST['create'])){
      try {
         $sqlArr=array();
         $arrLink = file('.htmenu');

         if(!is_array($arrLink)){
            throw new Exception ("Не удалось открыть файл");
         }

         foreach ($arrLink as $index) {
            
               list($id, $name, $href, $parrent_id, $css_class) = explode(';', $index);
               $resArr['name'] = $name;
               $resArr['href'] = $href;
               $resArr['parrent_id'] = $parrent_id;
               $resArr['css_class'] = $css_class;
               $resArr['title'] = $name;
               $sqlArr[] = $resArr;
         }

         $jscientia->SetLinks($sqlArr);
      } catch (Exeption $e)
      {
         echo $e;
      }
   }

}
?>
<form method="post">
   <input type="text" name="name">
   <label>name</label><br/>
   <input type="text" name="href">
   <label>href</label><br/>
   <input type="text" name="parrent_id">
   <label>parrent_id</label><br/>
   <input type="text" name="css_class">
   <label>css_class</label><br/>
   <input type="text" name="title">
   <label>title</label><br/>
   <input type="submit" name="add">

   <button type="submit" name="check">Проверить</button>
   <button type="submit" name="create">Создать</button>
</form>
<?
   if (isset($_POST['check'])){
      $check=$jscientia->GetLinks();
     // foreach ()
      var_dump($check);
   }

?>