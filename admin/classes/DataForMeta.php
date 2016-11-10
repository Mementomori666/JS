<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 08.11.2016
 * Time: 12:27
 */
require_once "Autoload.php";

class DataForMeta
{
   public $year = 0;
   public $numMag = 0;

   /**
    * @param int $year
    */
   public function setYear($year)
   {
      $this->year = $year;
   }

   /**
    * @param int $numMag
    */
   public function setNumMag($numMag)
   {
      $this->numMag = $numMag;
   }


   private function getAuthorSql()
   {
      try {
         $link = Connect::getInstance()->getLink();
         $query = "SELECT fio_ru, fio_en, current_job, email, article_id
                      FROM author  ; ";
         $result = $link->query($query);
         $result = $result->fetchAll(PDO::FETCH_ASSOC);
//         var_dump($result); die();
         return $result;

      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }

   private function getArticleSql()
   {
      try {
         $link = Connect::getInstance()->getLink();
         $sql = "SELECT id, title_ru, title_en, annotation_ru, annotation_en, key_words_ru,
                         key_words_en, udk, grnti, doi, article_link, preview_link, pubyear, num_mag 
                  FROM article 
                  WHERE pubyear = :puyear AND num_mag = :mag ;";
         $query = $link->prepare($sql);
         $query->execute(array(':puyear' => $this->year, ':mag' => $this->numMag));
         $result = $query->fetchAll(PDO::FETCH_ASSOC);
//         var_dump($result); die();
         return $result;
      } catch (PDOException $e) {
         echo $e->getMessage();
         return false;
      }
   }


   public function getArticle()
   {
      $articleArray = $this->getArticleSql();
      $authorArray = $this->getAuthorSql();
      foreach ($articleArray as $articles) {
         foreach ($authorArray as $authors) {
            if ($articles['id'] == $authors['article_id']) {
               $articles['authors'] = $authors;
               $id = $articles['id'];
               $articlesArray["$id"] = $articles;
            }
         }
      }
      return $articlesArray;
   }
}