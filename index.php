<?php 
    include __DIR__."/services/adminService.php" ;
    include "includes/function.php" ;

    $signUpStatus = null ;
    $pwdError = null ;
    $signInStatus = null ;
    $notValid = null ;
    $showData = "signUp" ;

    if(isset($_POST["submit"])){
        if(!pwdIsConfirmed($_POST["pwd"], $_POST["confirmedPwd"])){
            $pwdError = "Please enter matching password !!" ;
            header("Refresh:3; url=http://localhost/planetdev/index.php") ;
        }else{
            $signUpStatus = createAdmin() ;
        }
    }

    if(isset($_POST["signIn"])){
        $showData = "signIn" ;
        if( !inValidInputs($_POST)){
            $signInStatus = signAdminIn() ;
        }else{
            $notValid = "invalid data !!" ;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Planet Dev</title>
</head>
<body class="row">
    <nav class="navbar navbar-expand-lg">
        <div class="container-xxl">
        <div class="mx-4">
        <img id="logo" src="images/dailydev.png" alt=""> 
            <span class="planet navbar-brand fw-bold" href="#">Planet Dev </span>
        </div>
    </div>
    </nav>
    <section id="signUpForm" class="row col-10 m-3 h-75" <?= ($showData == "signIn") ? 'style="display:none ;"': "" ;   ?>> 
        <div  id="form" class="col-xs-12 col-sm-10 col-md-5 col-lg-6 container w-50 border border-2 pb-3">
        <h4 class="text-center ">Sign Up </h4>

        <?php if($signUpStatus == "Exist") : ?>
            <div class="alert alert-danger">
                <strong>User already exist</strong>
            </div>
        <?php elseif($signUpStatus == "Created") :?>
            <div class="alert alert-success">
                 <strong>User created successfully </strong>
            </div>
        <?php endif ;  ?>
        <form id="signingUpForm" style="font-size: 1.2vw;" method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3 col-">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input name="name" type="text" class="form-control input-group input-group-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small></small>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address </label>
                <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small></small>
            </div>
            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input name="phone" type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="06-12-33-45-67">
                <small></small>
            </div> -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input name="profile" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small></small>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="pwd" type="password" class="form-control" id="exampleInputPassword1">
                <small></small>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input name="confirmedPwd" type="password" class="form-control" id="exampleInputPassword1">
                <small></small>
            </div>
            <?php if($pwdError) :  ?>
                <div class="alert alert-danger">  <?= $pwdError ?> <i class="fa-solid fa-face-relieved"></i></div>
            <?php endif ; ?>
            <button name="submit" type="submit" class="btn btn-primary">Sign Up</button>
            <span  class="text-muted ">Already Sign Up ? <a class="text-primary " role="button" id="signInLink" >Sign In</a> </span>
        </form>
    </div> 
    <img id="img"  class="d-none d-md-inline col-md-4 col-lg-5" src="images/Bibliophile.gif" alt="">
    </section> 

    <div id="signInForm" class="container w-50"  <?= ($showData == "signUp") ? 'style="display:none ;"': "" ;   ?>>
        <?php if($notValid) : ?>
            <div class="alert alert-danger"><?= $notValid ;?></div>
        <?php endif ;  ?>
        <?php if($signInStatus == "notAuser" ) :  ?>
        <div class="alert alert-warning text-center m-auto w-50">
         <i class="fa-solid fa-face-relieved"></i> <?= "User Not registered !"  ?>
        </div>
    <?php 
        header("Refresh:3; url=http://localhost/planetDev/index.php") ;
        endif ; 
    ?>
        <h2 class="text-center">Sign In</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <div class="mb-3 w-75 ">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-75">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input name="pwd" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button name="signIn" type="submit" class="btn btn-primary mt-2">Sign In</button>
            <span  class="text-muted ">Don't have an account ? <a class="text-primary" id="singUp12" >Sign Up</a> </span>
        </form>
    </div> 
    
    <?php include "templates/footer.php" ?>


    