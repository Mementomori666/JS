<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 04.11.2016
 * Time: 19:00
 */
require_once "classes/Autoload.php";
try {
   $link = Connect::getInstance()->getLink();
   $query = "SELECT * From 'author';";
   $result = $link->query($query);

   foreach ($result as $row) {
      var_dump($row);
//      echo $row['fio_ru'] . "\t";
//      print $row['fio_en'] . "\t";
//      print $row[' current_job'] . "\t";
//      print $row[' article_id'] . "\n";
   }

} catch (PDOException $e) {
   echo $e->getMessage();
}