<?php
define('__ABS_PATH__', "http://localhost/planetdev");
require "navbar.php";
include "../services/adminService.php";
include "../includes/function.php";

// isNotSignedIn();
$articleData = fetchingArticles();


if (isset($_POST["addArticle"])) {
    addArticle();
    header("location: adminPage.php?&action=Articles");
}

if (isset($_GET["action"]) && $_GET['action'] === 'delete') {
    deleteArticle();
    sleep(1);
    header("location: adminPage.php?&action=Articles");
}

if (isset($_GET["action"]) && $_GET['action'] === 'signOut') {
    signOut();
}
?>

<div id="mainPage">
    <?php if (isConnected()) : ?>
        <aside id="aside" class="">
            <div class="container text-light">
                <div id="profileHolder" class="text-center text-dark pt-2">
                    <img class="rounded-circle w-50 h-50" src="../images/<?= $_SESSION["profile"] ?>" alt="">
                    <h5 class="text-white"> Welcome <strong class="text-white"> <?= $_SESSION["admin"] ?> </strong> </h5>
                </div>
                <ul id="side" class="col-1 col-sm-2 col-md-2 list-group w-75">
                    <li class="list pt-2"> <a href="adminPage.php?&action=dashboard"> <i class="fa-solid fa-house"></i> <strong>Dashboard </strong> </a> </li>
                    <li class="list pt-2"> <a href="adminPage.php?&action=NewsArticles"> <i class="fa-solid fa-earth-asia"></i><strong>Tech World</strong></a></li>
                    <li class="list pt-2"> <a href="adminPage.php?&action=Articles"><i class="fa-solid fa-book"></i> <strong>Articles</strong> </a> </li>
                    <li class="list pt-2"> <a href="adminPage.php?&action=profile" class=""><i class="fa-solid fa-user"></i> <strong> Profile </strong></a></li>
                    <li class="list pt-2"> <a href="adminPage.php?&action=addArticle"><i class="fa-solid fa-plus"></i> <strong>add Article</strong> </a></li>
                    <li class="list pt-2"> <a href="adminPage.php?&action=signOut"> <i class="fa-solid fa-right-from-bracket"></i> <strong>Sign Out</strong></a> </li>
                </ul>
            </div>
        </aside>
        <div id="mainDiv" class="">
            <?php
            if (isset($_GET['action']) and $_GET["action"] === "profile") {
                require "profile.php";
            }
            ?>
            <div class="d-flex justify-content-around flex-wrap dashboard mb-4 pb-5">
                <?php
                if (isset($_GET['action']) and $_GET["action"] === "dashboard") {
                    require "dashboard.php";
                }
                ?>
            </div>
            <?php if (isset($_GET['action']) and $_GET["action"] === "Articles") : ?>
                <main id="articleMain" class="mx-5 col-sm-3 col-md-10 col-lg-10 pt-2">
                    <div id="searching" class="input-group d-flex justify-content-center">
                        <div id="searchDiv" class="form-outline w-25 text-center ">
                            <label class="form-label text-warning fw-bold mx-3 w-50 h4">Search</label>
                            <input placeholder="Search Here !!" type="search" id="searchInput" class="form-control inline p-2" />
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around pb-4">
                        <?php foreach ($articleData as $article) : ?>
                            <div id="cardData" class="col-sm-2 col-md-3 card mt-3" style="width: 18rem;">
                                <img id="bookImg" src="../images/<?= $article["image"] ?>" class="card-img-top" style="height: 15rem ;" alt="...">
                                <div class="card-body text-center">
                                    <h3 class="cardTitle"><?= $article["title"]   ?></h3>
                                    <p><?= $article["body"] ?></p>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-warning "><a href="../process.php?id=<?= $article["id"] ?>">update </a> </button>
                                    <button name="delete" value="delete" class="btn btn-danger text-dark"><a href="adminPage.php?id=<?= $article["id"] ?>&action=delete">delete </a> </button>
                                </div>
                            </div>
                        <?php endforeach;  ?>
                    </div>
                </main>
            <?php endif;  ?>
            
            <?php if (isset($_GET['action']) and $_GET["action"] === "NewsArticles") : ?>
                <div class="input-group d-flex justify-content-around">
                    <div class="form-outline d-flex pt-2 mt-3">
                        <img  class="Icons mx-4" src="../images/bitcoin.webp" alt="bitcoin" title="Bitcoin News" srcset="">
                        <img class="Icons  mx-4" src="../images/apple.png" alt="apple"  title="Apple News"srcset="">
                        <img class="Icons mx-4" src="../images/Tesla_logo.png" alt="tech"  title="Tesla News" srcset="">
                    </div>
                    <div id="searchDiv" class="form-outline w-25">
                        <label class="form-label text-warning fw-bold mx-3 w-50 h4">Search</label>
                        <input placeholder="Search Here !!" type="search" id="searchInput" class="form-control inline p-2" />
                    </div>
                </div>
                <main id="articleMain" class="mx-5 col-sm-3 col-md-10 col-lg-10 pt-2">
                    <div id="newsContainer" class="row d-flex justify-content-around">
                         
                    </div>
                </main>
            <?php endif;  ?>
                          

            
            <?php if (isset($_GET['action']) and $_GET["action"] === "addArticle") : ?>
                <div class="container w-50 pb-5 border-2 rounded pt-2 p-5 mt-3" style="background-color: #A7D2CB;box-shadow: inset 0 0 15px #000000; ">
                    <h2 class="text-center">add Article</h2>
                    <form id="articleForm" method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Title</label>
                            <input name="title[]" type="text" class="form-control">
                            <small></small>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Image</label>
                            <input name="image[]" type="file" class="form-control">
                            <small></small>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Body</label>
                            <input name="body[]" type="text" class="form-control">
                            <small></small>
                        </div>
                        <button id="addArticleBtn" name="addArticle" type="submit" class="btn btn-primary mt-2">Submit</button>
                        <button id="anotherForm" type="button" class="btn btn-secondary mt-2">Another Form</button>
                    </form>
                </div>
            <?php endif;  ?>
            <?php endif; ?>
        </div>
</div>
<script src="../app.js"></script>
<?php require "footer.php"; ?>