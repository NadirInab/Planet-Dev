<?php
require "./include/functions.php";
require "./include/autoload.php";

$connection = new DbConnection() ;
$connect = $connection->connect() ;

function addArticle()
{
    global $connect;
    AdminCrud::addArticle($_POST, $connect);
}
