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
                      FROM 'author'  ; ";
         $result = $link->query($query,PDO::FETCH_ASSOC);
         $result = $result->fetchAll();
         return $result;
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }
   private function getArticleSql(){
      try {
         $link = Connect::getInstance()->getLink();
         $sql = "SELECT id, title_ru, title_en, annotation_ru, annotation_en, key_words_ru,
                         key_words_en, udk, grnti, doi, article_link, preview_link, pubyear, num_mag 
                  FROM 'article' WHERE pubyear =':pubyear'AND num_mag = ':num_mag' ;";
         $query = $link->prepare($sql);
         $result = $query->execute(array(':pubyear' => $this->year, ':num_mug'=>$this->numMag));
         $result = $result->fetch(PDO::FETCH_ASSOC);
         return $result;
      }catch (PDOException $e){
         echo $e->getMessage();
         return false;
      }
   }

   

   public function getArticle(){
      $articleArray = $this->getArticleSql();
      $authorArray = $this->getAuthorSql();
     if ($authorArray['article_id']==$articleArray['id'])
        return $result = $articleArray['authors'] = $authorArray;
     
   }
}