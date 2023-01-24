<?php 
    isNotSignedIn() ;
?>
<div id="profileSection" class="col-7 mx-3 pt-4 mx-5">
        <div class="card p-3" >
        <div class="row ">
            <div class="col-md-6 border border-2 ">
                <img src="../images/<?= $_SESSION["profile"]   ?>" class="img-fluid rounded-start w-75  mx-5" alt="...">
            </div>
        <div class="col-md-6">
            <div class="card-body h-75 p-5">
                <h5 style="color: #243763;" class="card-title p-2"> <i class="fa-solid fa-user mx-2"></i>  Name  : <strong class="text-secondary">  <?= $_SESSION["admin"] ?>  </strong></h5>
                <h5 style="color: #243763;" class="card-title p-2"><i class="fa-solid fa-envelope mx-1"></i> Email :<strong class="text-secondary"> <?= $_SESSION["email"]   ?> </strong></h5>
                <!-- <h6 style="color: #243763;" class="card-title p-2"> <i class="fa-solid fa-phone mx-2"></i>  Phone : <strong class="text-secondary ">  <?= 'test'   ?></strong></h6> -->
            </div>
        </div>
        </div>
        </div>
    </div>

    <?php include "footer.php" ; ?>