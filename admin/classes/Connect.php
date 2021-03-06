<?php

/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 28.05.2016
 * Time: 21:01
 */
class Connect
{
    static private $_instance = null;
    private $link = null;
    private $db = 'mysql:host=localhost; dbname=jscientia';
    private $user = 'root';
    private $pwd = '';

    private function __construct(){
        try{
            $this->link = new PDO($this->db, $this->user, $this->pwd);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){

        }
    }

    public static function getInstance(){
        if(self::$_instance == null){
            self::$_instance = new Connect();
        }
        return self::$_instance;
    }

    public function getLink(){
        return $this->link;
    }
}