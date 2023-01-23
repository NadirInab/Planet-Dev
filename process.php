<?php 

   include "includes/autoloader.php" ;
   //include "templates/navbar.php" ;
    $connection = new DbConnection ;
    $connect = $connection->connect() ;

    $article_id = $_GET["id"] ;
    $Query = "SELECT * FROM article WHERE id = :id" ;
    $stmt = $connect->prepare($Query) ;
    $stmt->bindParam(':id' , $article_id) ;
    $stmt->execute() ;
    $articleData = $stmt->fetch(PDO::FETCH_ASSOC) ;
    if(isset($_POST["upDateArticle"])){
        // echo "<pre>" ;
        //     var_dump($_POST) ;
        // echo "<pre>" ;
        // die() ;
        $article = ["title" => $_POST["title"], "body" => $_POST["body"], "image" => $_POST["image"],"id" => $article_id ] ;
        AdminCrud::upDateArticle($article,$connect) ;
        header("location:http://localhost/planetdev/templates/adminPage.php?action=Articles") ;
    }
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Planet dev</title>
</head>
<body class="row">

<nav class="navbar">
    <div class="container-xxl">
      <div class="">
      <img id="logo" src="images/LibraryLogo.png" alt=""> 
        <span class="navbar-brand fw-bold text-muted " href="#">Planet Dev </span>
      </div>
  </div>
</nav>
    <div class="container border border-muted w-50 p-3 mt-5">
        <h2 class="text-center fw-bold">UpDate  Article</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"].'?id='.$article_id?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Title</label>
                <input name="title" type="text" value="<?= $articleData['title'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">body</label>
                <input name="body" value="<?= $articleData['body'] ?>" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Image</label>
                <input name="image" type="file" class="form-control" value="hiho">
            </div>
            <button name="upDateArticle" type="submit" class="btn btn-primary mt-2">  Submit</button>
        </form>
    </div> 
<?php
    require "templates/footer.php" ;
?>