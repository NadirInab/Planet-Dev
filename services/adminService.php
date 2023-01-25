<?php
include __DIR__ . "/../includes/autoloader.php";
$connection = new DbConnection;
$connect = $connection->connect();

function createAdmin()
{
    global $connect;
    $data = ["fullName" => $_POST["name"], "email" => $_POST["email"], "profile" => $_POST["profile"], "pwd" => $_POST["pwd"], "confirmedPwd" => $_POST["confirmedPwd"]]; // md5
    $query = "SELECT * FROM admin WHERE email = :email and name = :fullName";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(":email", $data["email"]);
    $stmt->bindParam(":fullName", $data["fullName"]);
    $stmt->execute();
    $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() != 0) {
        $userExist = "Exist";
        return $userExist;
    } else {
        AdminFactory::createAdmin($connect, $data);
        return "Created";
    }
}

function signAdminIn()
{
    global $connect;
    $userData = ["email" => $_POST["email"], "pwd" => md5($_POST["pwd"])];
    $query = "SELECT * FROM admin WHERE email = :email AND pwd = :pwd";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':email', $userData["email"]);
    $stmt->bindParam(':pwd', $userData["pwd"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        session_start();
        $_SESSION["admin"] = $result["name"];
        $_SESSION["profile"] = $result["image"];
        $_SESSION["email"] = $result["email"];
        $_SESSION["admin_id"] = $result["Admin_id"];
        header("location: http://localhost/planetdev/templates/adminPage.php?&action=dashboard");
    } else {
        return  "notAuser";
    }
}


function addArticle()
{
    global $connect;
    foreach ($_POST["title"] as $key => $value) {
        $articleData = ["title" => $_POST["title"][$key], "image" => $_POST["image"][$key], "body" => $_POST["body"][$key]];
        AdminCrud::addArticle($articleData, $_SESSION["admin_id"], $connect);
    }
    header("location:" . $_SERVER['PHP_SELF']);
}

function fetchingBooks()
{
    global $connect;
    $admin_id = $_SESSION["admin_id"];
    $Query = "SELECT * FROM article";
    $stmt = $connect->prepare($Query);
    $stmt->execute();
    $booksData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $booksData;
}

function deleteArticle()
{
    global $connect;
    AdminCrud::deleteArticle($_GET["id"], $connect);
}

function signOut()
{
    session_destroy();
    header("location: http://localhost/planetdev/index.php");
}

function usersCounter()
{
    global $connect;
    $query = "SELECT * FROM admin";
    $stmt = $connect->query($query);
    $rowCount = $stmt->rowCount();
    return $rowCount;
}
function userArticlesCounter($id)
{
    global $connect;
    $query = "SELECT * FROM article WHERE admin_id = $id";
    $stmt = $connect->query($query);
    $rowCount = $stmt->rowCount();
    return $rowCount;
}
function articlesCounter()
{
    global $connect;
    $query = "SELECT * FROM article";
    $stmt = $connect->query($query);
    $rowCount = $stmt->rowCount();
    return $rowCount;
}

    // function typeCounter(){
    //     global $connect ;
    //     $query = "SELECT * FROM book WHERE type LIKE '%IT%' " ;
    //     $stmt = $connect->query($query) ;
    //     $rowCount = $stmt->rowCount() ;
    //     return $rowCount ;
    // }
    // function mystryCounter(){
    //     global $connect ;
    //     $query = "SELECT * FROM book WHERE type LIKE '%Mystery%' " ;
    //     $stmt = $connect->query($query) ;
    //     $rowCount = $stmt->rowCount() ;
    //     return $rowCount ;
    // }
