<?php 

   include "includes/autoloader.php" ;
   //include "templates/navbar.php" ;
    $connection = new DbConnection ;
    $connect = $connection->connect() ;

    $book_id = $_GET["id"] ;
    $bookQuery = "SELECT * FROM book WHERE isbn = :isbn" ;
    $stmt = $connect->prepare($bookQuery) ;
    $stmt->bindParam(':isbn' , $book_id) ;
    $stmt->execute() ;
    $bookData = $stmt->fetch(PDO::FETCH_ASSOC) ;
    if(isset($_POST["upDateBook"])){
        $bookData = ["title" => $_POST["title"], "type" => $_POST["type"], "image" => $_POST["bookImage"], "publish_date" => $_POST["publish_date"],"isbn" =>$book_id ] ;
        AdminCrud::upDateBook($bookData,$connect) ;
        header("location:http://localhost/libraryManagement/templates/adminPage.php?action=books") ;
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
    <title>YouCode Library</title>
</head>
<body class="row">

<nav class="navbar">
    <div class="container-xxl">
      <div class="">
      <img id="logo" src="images/LibraryLogo.png" alt=""> 
        <span class="navbar-brand fw-bold text-muted " href="#">YouCode Library</span>
      </div>
  </div>
</nav>
    <div class="container border border-muted w-50 p-3 mt-5">
        <h2 class="text-center fw-bold">UpDate  Book</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"].'?id='.$book_id?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Title</label>
                <input name="title" type="text" value="<?= $bookData['title'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Publish Date</label>
                <input name="publish_date" value="<?= $bookData['publish_date'] ?>" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <label class="fw-bold" for="select">Type</label>
            <select name="type" class="form-select" aria-label="Default select example">
                <option  selected>Book type</option>
                <option <?= ($bookData["type"] == "FN")? "selected" : "" ?> value="FN">FN</option>
                <option <?= ($bookData["type"] == "Cartoon")? "selected" : "" ?> value="Cartoon">Cartoon</option>
                <option  <?= ($bookData["type"] == "IT")? "selected" : "" ?> value="IT">IT</option>
                <option  <?= ($bookData["type"] == "ST")? "selected" : "" ?> value="ST">Short Stories</option>
                <option  <?= ($bookData["type"] == "Mystery")? "selected" : "" ?> value="Mystery">Mystery</option>
            </select>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Book Image</label>
                <!-- <input name="bookImage" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                <input name="bookImage" type="file" class="form-control" value="hiho" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button name="upDateBook" type="submit" class="btn btn-primary mt-2">  Submit</button>
        </form>
    </div> 
<?php
    require "templates/footer.php" ;
?>