<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 12.08.2016
 * Time: 19:47
 */


class JSCSql
{
   const SQL_FILE = '../jscientia.sql';
   
   private $sql;
   private $link;
   private $stmt;

   function __construct()
   {
      if(is_file(self::SQL_FILE)){
         $this->link =new SQLite3(self::SQL_FILE);
      }
      else {
         $this->link =new SQLite3(self::SQL_FILE);
         $this->sql="CREATE TABLE Item_Menu (
                     id INTEGER PRIMARY KEY AUTOINCREMENT, 
                     name TEXT, 
                     href TEXT, 
                     parrent_id INTEGER , 
                     css_class TEXT, 
                     title TEXT);";

         try {
            function throwExept(){
               throw new Exception("error_pragma");
            }
            $this->link->query('PRAGMA encoding="UTF-8";') or throwExept() ;
            $this->link->exec($this->sql);
         } catch (Exception $e){
            echo $this->link->lastErrorMsg();
            echo $e;
         }

      }

   }
   function __destruct()
   {
      unset($this->link) ;
   }
   
   function SetLinks ($arr=array()) {

      try{
         foreach ($arr as $arrItem) {
            $name=$arrItem['name'];
            $href=$arrItem['href'];
            $parrent_id=$arrItem['parrent_id'];
            $css_class=$arrItem['css_class'];
            $title=$arrItem['title'];
            
         $this->stmt = $this->link->prepare('INSERT INTO Item_Menu (name, href, parrent_id, css_class,title)
                              VALUES (:name, :href, :parrent_id, :css_class, :title)');
         $this->stmt->bindParam(':name', $name);
         $this->stmt->bindParam(':href', $href);
         $this->stmt->bindParam(':parrent_id', $parrent_id);
         $this->stmt->bindParam(':css_class', $css_class);
         $this->stmt->bindParam(':title', $title);
         $this->stmt->execute();
         $this->stmt->close();
      }
         echo $this->sql;
      }catch (Exception $e){
         echo $this->link->lastErrorMsg();
      }
   }
   function GetLinks (){
      try{
         $this->sql="SELECT name, href, parrent_id, css_class, title
                    FROM Item_Menu;";

         $result= $this->link->query($this->sql);
         $rows= array();
         while($row =$result->fetchArray(SQLITE3_ASSOC)){
            $rows[]=$row;
         }
        
         if (is_array($rows)){
            return $rows;}
         else{
            throw (new Exception ('not_array'));
         }
      }catch (Exception $e){
         echo $e;
         echo $this->link->lastErrorMsg();
      }
   }
}