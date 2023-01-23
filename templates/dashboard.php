<?php 
    isNotSignedIn() ;
    $userCount = usersCounter() ;
    $booksCount = articlesCounter() ;
    $fictionCounter = 5 ;
    $mystryCounter = 5 ;
?>
 <div class="mx-5 card mt-2" style="width:15rem;">
    <img class="card-img-top" src="../images/books.jpg" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center text-muted">Total of Articles : <strong class="fw-bold text-warning">  <?= $booksCount ;  ?> </strong> </h4>
    </div>
</div>

<div class="mx-5 card mt-2" style="width: 15rem;">
    <img class="card-img-top" src="../images/users.png" alt="Card image cap">
    <div class="card-body mt-5">
        <h4 class="card-title pt-3 mt-3 text-center text-muted">Total of Users <br> <strong class="fw-bold text-warning"> <?=  $userCount ?> </strong>  </h4>
    </div>
</div>



 <div class="mx-5 card mt-2 " style="width: 15rem;">
    <img class="card-img-top" src="../images/codingBooks.webp" alt="Card image cap">
    <div class="card-body mt-4">
        <h4 class="card-title pt-3 mt-3 text-center text-muted">Total of IT Books <br> <strong class="fw-bold text-warning"> <?=  $fictionCounter ?> </strong></h4>
    </div>
</div>
 <div class="mx-5 card mt-2" style="width: 14rem;">
    <img class="card-img-top pt-5" src="../images/mystry.jpeg" alt="Card image cap">
    <div class="card-body mt-4">
        <h4 class="card-title pt-3 mt-3 text-center text-muted pt-5">Total of mystry Books <br> <strong class="fw-bold text-warning"> <?=  $mystryCounter ?> </strong></h4>
    </div>
</div>

