<?php

error_reporting(E_ALL);
/*
$connect=mysql_connect("db_chateaugontierfr","test","test");
$base='test';
$base=mysql_selectdb("$base");
*/
$host = "db_chateaugontierfr";
$user = "test";
$password = "test";
$dbname = "test";

$pdo = null;
try{
$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname,
        $user,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}


?>