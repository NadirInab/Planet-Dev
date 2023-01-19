<?php 
    require "./services/adminServices.php" ;
    require "./templates/header.php" ;

    if(isset($_POST["submit"])){
        addArticle() ;
        // dd($_POST) ;
        // die() ;
    }
?>
<main class="w-9/12 mx-auto ">
    <?php require "./templates/form.php" ;?>
</main>

<?php require "./templates/footer.php" ?>