<?php 
    require "./classes/DbConnection.php" ;
    require "./services/adminServices.php" ;
    require "./templates/header.php" ;

    if(isset($_POST["submit"])){
        addArticle() ;
    }
?>
<main class="w-9/12 mx-auto ">
    <div class="flex flex-wrap">
        <?php  require "./templates/articles.php" ;?>
    </div>
    <?php require "./templates/form.php" ;?>
</main>

<?php require "./templates/footer.php" ?>