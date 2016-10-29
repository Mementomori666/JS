<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 28.10.2016
 * Time: 10:42
 */
include_once '../../classes/Connect.php';

class AddAuthors
{

   private function addAuthors($fio_ru, $fio_en, $current_job, $email){
      function strClean($data){
         return strip_tags(trim($data));
      }
      $fio_ru=strClean($fio_ru);
      $fio_en= strClean($fio_en);
      $current_job=strClean($current_job);
      $email=strClean($email);
      try{
         $link = Connect::getInstance()->getLink();
         $prepare = "INSERT INTO authors (fio_ru, fio_en, current_job, email)
                      VALUES (:fio_ru, :fio_en, :current_job, :email)";
         $query=$link->prepare($prepare);
         $query->execute([':fio_ru'=>$fio_ru, ':fio_en'=>$fio_en,
                          ':current_job'=>$current_job, ':email'=>$email ]);
      }
      catch (Exception $e){
         echo $e->getMessage();
      }

   }
}