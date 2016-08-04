<?php

/**
 * Created by PhpStorm.
 * User: Егор
 * Date: 04.08.2016
 * Time: 23:42
 */


class DB
{
protected $db = '';
protected $host = '';
protected $charset = '';
    /**
     * BD constructor.
     * @param $user
     * @param $password
     */
    function __construct($user, $password)
    {
        $host = $this->host;
        $db = $this->db;
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $conn = "mysql:host=$host;dbname=$db;charset='charset'";
        $pdo = $opt.','.$conn.','. $user.','. $password;
        return $pdo;
    }
}