<?php

/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2016/2/3
 * Time: 11:28
 */
require_once APP_PATH.'/application/library/PDO/FluentPDO.php';

class Common_Sql{
    public $db;
    function __construct(){
       $pdo = new PDO("mysql:dbname=test", "root", "");
       $this->db = new PDO_FluentPDO($pdo);
   }
}