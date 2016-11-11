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
//   $query = "SELECT fio_ru, fio_en, current_job, email, article_id, article.id, title_ru, title_en, annotation_ru, annotation_en, key_words_ru,
//                    key_words_en, udk, grnti, doi, article_link, preview_link, pubyear, num_mag
//             From 'author', 'article'
//             WHERE pubyear = 2015 and num_mag = 6;";
//   $result = $link->query($query, PDO::FETCH_ASSOC);
//   $result= $result->fetchAll();
//  var_dump($result);
//   foreach ($result as $row) {
//      var_dump($row);
//
//   }
//
//} catch (PDOException $e) {
//   echo $e->getMessage();
//}

$year = 2015;
$numMag = 3;
$data = new DataForMeta();
$data->setYear($year);
$data->setNumMag($numMag);
$result = $data->getArticle();
echo '<pre>';
var_dump($result);
echo '</pre>';