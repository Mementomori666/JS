<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 04.11.2016
 * Time: 19:00
 */
require_once "classes/Autoload.php";
//try {
//   $link = Connect::getInstance()->getLink();
//   $query = "SELECT * From 'author', 'article';";
//   $result = $link->query($query, PDO::FETCH_ASSOC);
//
//   foreach ($result as $row) {
//      var_dump($row);
////      echo $row['fio_ru'] . "\t";
////      print $row['fio_en'] . "\t";
////      print $row[' current_job'] . "\t";
////      print $row[' article_id'] . "\n";
//   }
//
//} catch (PDOException $e) {
//   echo $e->getMessage();
//}
$year = 2016;
$numMag = 3;
$data = new DataForMeta();
$data->setYear($year);
$data->setNumMag($numMag);
$result = $data->getArticle();
var_dump($result);