<?php
require "./include/functions.php";
require "./include/autoload.php";

$connection = new DbConnection() ;
$connect = $connection->connect() ;
function addArticle()
{
    global $connect;
    // $articleData = ["title" => $_POST["title"], "image" => $_POST["image"], "body" => $_POST];
    AdminCrud::addArticle($_POST, $connect);
}
