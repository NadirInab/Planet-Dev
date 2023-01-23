<?php 
    define('__ABS_PATH__', "http://localhost/planetdev") ;
    require "navbar.php"  ;
    include "../services/adminService.php" ;
    include "../includes/function.php" ;

    isNotSignedIn() ;
    $articleData = fetchingBooks() ;

    if(isset($_POST["addArticle"])){
        addArticle() ;
         header("location: adminPage.php?&action=Articles" ) ;
    }
    
    if(isset($_GET["action"]) && $_GET['action'] === 'delete'){
        deleteArticle() ;
        sleep(1) ;
        header("location: adminPage.php?&action=Articles" ) ;
    }
    
    if(isset($_GET["action"]) && $_GET['action'] === 'signOut'){
        signOut() ;
    }

?>

<div id="mainPage">
    <?php if(isConnected()) : ?>
        <aside id="aside" class="">
            <div  class="container text-light">
                <div id="profileHolder" class="text-center text-dark pt-2">
                    <img class="rounded-circle w-50 h-50" src="../images/<?=  $_SESSION["profile"] ?>" alt="">
                    <h5 > Welcome <strong class="text-secondary"> <?= $_SESSION["admin"] ?> </strong> </h5>
                </div>
                <ul id="side" class="col-1 col-sm-2 col-md-2 list-group w-75">
                    <li class="list pt-2"> <a  href="adminPage.php?&action=dashboard"> <i class="fa-solid fa-house"></i> <strong>Dashboard </strong>  </a> </li>
                    <li class="list pt-2"> <a  href="adminPage.php?&action=Articles"><i class="fa-solid fa-book"></i> <strong>Articles</strong> </a> </li>
                    <li class="list pt-2"> <a  href="adminPage.php?&action=profile" class=""><i class="fa-solid fa-user"></i> <strong> Profile </strong></a></li>
                    <li class="list pt-2"> <a  href="adminPage.php?&action=addArticle"><i class="fa-solid fa-plus"></i> <strong>addBook</strong> </a></li>
                    <li class="list pt-2"> <a  href="adminPage.php?&action=signOut"> <i  class="fa-solid fa-right-from-bracket"></i> <strong>Sign Out</strong></a> </li>
                </ul>
            </div>
        </aside> 
        <div id="mainDiv" class="">
        <?php
          if(isset($_GET['action']) AND $_GET["action"] === "profile"){
             require "profile.php" ;
             die() ;
            }
        ?>
        <div class="d-flex dashboard">
        <?php
            if(isset($_GET['action']) AND $_GET["action"] === "dashboard"){
                require "dashboard.php" ; 
            }
        ?>
        </div>
      
        <?php if(isset($_GET['action']) AND $_GET["action"] === "books") :?>
            <main class="mx-5 col-sm-3 col-md-10 col-lg-10 pt-2">
                <div class="row d-flex justify-content-around">
                <?php foreach($articleData as $article) : ?>
                    <div id="cardData" class="col-sm-2 col-md-3 card mt-3" style="width: 18rem;">
                        <img id="bookImg" src="../images/<?= $article["image"] ?>" class="card-img-top" style="height: 15rem ;" alt="...">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> <strong>Title &nbsp;&nbsp;&nbsp;:</strong> <?= $article["title"] ?> </li>
                                <li class="list-group-item"> <strong>Type &nbsp;&nbsp;&nbsp;:</strong> <?= $article["image"] ?> </li>
                                <li class="list-group-item"> <strong> Publish-Date : </strong> <?= $article["body"] ?> </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-warning "><a href="../process.php?id=<?=$article["id"]?>">update </a>  </button>
                            <button name="delete" value="delete" class="btn btn-danger text-dark"><a href="adminPage.php?id=<?=$article["id"]?>&action=delete">delete </a>  </button>
                        </div>
                    </div>
                    <?php endforeach ;  ?>
                    </div>  
            </main>
        <?php endif ;  ?>
 

        <?php if(isset($_GET['action']) AND $_GET["action"] === "addBook") :?>
        <div class="container w-50 pb-5">
            <h2 class="text-center">add Book</h2>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Title</label>
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Image</label>
                    <input name="image" type="file" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Body</label>
                    <input name="body" type="text" class="form-control">
                </div>
                <button name="addArticle" type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>  

        <?php elseif(isset($_GET['action']) AND $_GET["action"] === "upDateBook") : ?>
            <div class="container w-50">
            <h2 class="text-center">add Book</h2>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input name="title" type="text" value="<?= $bookData['title'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Publish Date</label>
                    <input name="publish_date" value="<?= $bookData['publish_date'] ?>" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <select name="type" class="form-select" aria-label="Default select example">
                    <option  selected>Book type</option>
                    <option <?= ($bookData["type"] == "FN")? "selected" : "" ?> value="FN">FN</option>
                    <option <?= ($bookData["type"] == "Cartoon")? "selected" : "" ?> value="Cartoon">Cartoon</option>
                    <option  <?= ($bookData["type"] == "IT")? "selected" : "" ?> value="IT">IT</option>
                    <option  <?= ($bookData["type"] == "ST")? "selected" : "" ?> value="ST">Short Stories</option>
                    <option  <?= ($bookData["type"] == "Mystery")? "selected" : "" ?> value="Mystery">Mystery</option>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Book Image</label>
                    <input  name="bookImage" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button name="upDateBook" type="submit" class="btn btn-primary mt-2">  Submit</button>
            </form>
        </div> 
            <?php endif ;  ?>
        <?php endif ; ?>
    </div>
    </div>
    
    <?php require "footer.php" ; ?>
