<?php

/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 12.08.2016
 * Time: 19:47
 */

include_once 'Autoload.php';
//include_once '../../classes/Connect.php';
class JSCSql
{
   private $sql;
   private $link;
   private $stmt;

   /**
    * JSCSql constructor.
    * Создает подключение к БД и если она отсутствует то создает и Саму БД
    */

   public function __construct()
   {
      try {
         $this->link = Connect::getInstance()->getLink();
      }catch (PDOException $e)
      {
         echo $e->getMessage();
      }
   }
      public function addMenuTable(){
         try{
        $sql = "CREATE TABLE Item_Menu (
                     id int AUTO_INCREMENT, 
                     name VARCHAR(20), 
                     href VARCHAR(50), 
                     parent_id int,
                     css_class VARCHAR(30) , 
                     title VARCHAR(30),
                     PRIMARY KEY (id));";
         $this->link->exec($sql);

      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }

   public function __destruct()
   {
      unset($this->link);
   }

   /**
    * Метод принимает массив и добавляет его содержимое в БД
    */
  public function SetLinks($arr = array())
   {

      try {
         $this->addMenuTable();
         foreach ($arr as $arrItem) {
            $name = $arrItem['name'];
            $href = $arrItem['href'];
            $parent_id = $arrItem['parent_id'];
            $css_class = $arrItem['css_class'];
            $title = $arrItem['title'];

            $this->stmt = $this->link->prepare('INSERT INTO Item_Menu (name, href, parent_id, css_class,title)
                              VALUES (:name, :href, :parent_id, :css_class, :title)');

            $this->stmt->execute(array(':name' => $name, ':href' => $href, ':parent_id' => $parent_id,
               ':css_class' => $css_class, ':title' => $title));

         }
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }

   /**
    * Метод возращает всё содержимое бд
    */
   public function GetLinks()
   {
      try {
          $this->sql = "SELECT name, href, parent_id, css_class, title
                    FROM Item_Menu;";
          $stmt = $this->link->prepare($this->sql);
         $stmt->execute();
         $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
       // var_dump($result);
          return $result;

      } catch (Exception $e) {
         echo $e->getMessage();
         echo $this->link->lastErrorMsg();
      }
   }
}