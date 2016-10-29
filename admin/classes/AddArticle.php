<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 28.10.2016
 * Time: 10:34
 */

include_once '../../classes/Connect.php';

class AddArticle{

   private function addArticle($title_ru, $title_en, $annotation_ru, $annotation_en, $key_words_ru,
                               $key_words_en, $udk, $grnti, $doi, $article_link, $preview_link){
      function strClean($data){
         return strip_tags(trim($data));
      }

      $title_en = strClean($title_en);
      $title_ru=strClean($title_ru);
      $annotation_ru=strClean($annotation_ru);
      $annotation_en=strClean($annotation_en);
      $key_words_ru=strClean($key_words_ru);
      $key_words_en=strClean($key_words_en);
      $udk = strClean($udk);
      $grnti = strClean($grnti);
      $doi = strClean($doi);
      $article_link = strClean($article_link);
      $preview_link = strClean($preview_link);


      
      try {
         $link = Connect::getInstance()->getLink();
         $prepare = "INSERT INTO article (title_ru, title_en, annotation_ru, annotation_en, key_words_ru,
                                key_words_en, udk, grnti, doi, article_link, preview_link)
                                 VALUES (:title_ru, :title_en, :annotation_ru, :annotation_en, :key_words_ru,
                                :key_words_en, :udk, :grnti, :doi, :article_link, :preview_link)";
         $query=$link->prepare($prepare);
         $query->execute([':title_ru' => $title_ru, ':title_en'=>$title_en,
                        ':annotation_ru'=>$annotation_ru,':annotation_en'=>$annotation_en,
                        ':key_words_ru'=>$key_words_ru,  ':key_words_en' =>$key_words_en,
                        ':udk'=>$udk, ':grnti'=>$grnti, ':doi'=>$doi,
                        ':article_link'=>$article_link, ':preview_link'=>$preview_link]);
         echo "article successfully created\n<br>"; }
      catch (Exception $e){
         echo $e->getMessage();
      }
   }
   }