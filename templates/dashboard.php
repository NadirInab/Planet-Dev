<?php 
    isNotSignedIn() ;
    $userCount = usersCounter() ;
    $articlesCount = articlesCounter() ;
    $userArticles = userArticlesCounter($_SESSION["admin_id"]) ;

    $fictionCounter = 5 ;
    $mystryCounter = 5 ;
?>
 <div class="mx-5 card mt-2" style="width:17rem; background-color: #628E90;">
    <img class="card-img-top p-3" src="../images/article.png" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center">Total of Articles : <strong class="fw-bold">  <?= $articlesCount ;  ?> </strong> </h4>
    </div>
</div>
 <div class="mx-5 card mt-2" style="width:17rem;background-color: #628E90;">
    <img class="card-img-top p-3" src="../images/article.png" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center">My Articles : <strong class="fw-bold">  <?= $userArticles ;  ?> </strong> </h4>
    </div>
</div>

<div class="mx-5 card mt-2" style="width: 17rem;background-color: #628E90;">
    <img class="card-img-top p-3 img-rounded" src="../images/users.png" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title mt-2 text-center">Total of Users <br> <strong class="fw-bold"> <?=  $userCount ?> </strong>  </h4>
    </div>
</div>

<div class="mx-5 card mt-2" style="width: 17rem;background-color: #628E90;">
    <img class="card-img-top p-3" src="../images/bitcoin.webp" alt="Card image cap">
    <div class="card-body mt-5">
        <h4 class="card-title pt-3 mt-3 text-center">Bitcoin News <br> <strong class="fw-bold"> <?=  100 ?> </strong>  </h4>
    </div>
</div>

<div class="mx-5 card mt-2" style="width: 17rem;background-color: #628E90;">
    <img class="card-img-top p-3" src="../images/apple.png" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title text-center">Apple News <br> <strong class="fw-bold"> <?=  100 ?> </strong>  </h4>
    </div>
</div>

<div class="mx-5 card mt-2" style="width: 17rem;background-color: #628E90;">
    <img class="card-img-top p-1 " src="../images/tesla2.png" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title text-center">Tesla News <br> <strong class="fw-bold"> <?=  10098 ?> </strong>  </h4>
    </div>
</div>


