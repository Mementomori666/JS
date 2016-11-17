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
    * DataForMeta constructor.
    * @param int $year
    * @param int $numMag
    */
   public function __construct($year, $numMag)
   {
      $this->year = $year;
      $this->numMag = $numMag;
   }


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


   private function getAuthorSql($article_id)
   {
      try {
         $link = Connect::getInstance()->getLink();
         $sql = "SELECT fio_ru, fio_en, current_job, email, article_id
                      FROM author WHERE article_id = :id;";
         $query = $link->prepare($sql);
         $query->execute([':id' => $article_id]);
         $result = $query->fetchAll(PDO::FETCH_ASSOC);
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
//      $authorArray = $this->getAuthorSql();
      foreach ($articleArray as &$articles) {
         $articles['authors'] = $this->getAuthorSql($articles['id']);
//         foreach ($authorArray as $authors) {
//            if ($articles['id'] == $authors['article_id']) {
//               $articles['authors'] = $authors;
//               $id = $articles['id'];
//               $articlesArray["$id"] = $articles;
//            }
//         }
      }
      return $articleArray;
   }

   public static function getLatestRelease(){
      $link = Connect::getInstance()->getLink();
      $sql = "SELECT pubyear, max(num_mag) as num_mag FROM article WHERE pubyear IN (SELECT max(pubyear) FROM article)";
      $res = $link->query($sql, PDO::FETCH_ASSOC);
      $res = $res->fetchAll();
      return $res;
   }

   public static function getAllReleases(){
      $link = Connect::getInstance()->getLink();
      $sql = "SELECT DISTINCT pubyear FROM article ORDER BY pubyear DESC";
      $res = $link->query($sql, PDO::FETCH_ASSOC);
      $res = $res->fetchAll();
      foreach($res as &$year){
         $sql = "SELECT DISTINCT num_mag FROM article WHERE pubyear = {$year['pubyear']} ORDER BY num_mag DESC";
         $releases = $link->query($sql, PDO::FETCH_ASSOC);
         $year['releases'] = $releases->fetchAll();
      }
      return $res;
   }
}