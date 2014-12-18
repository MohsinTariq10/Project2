<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/Project/functions.php';
?>

<!-- <div class="clearfix hidden-md  hidden-lg"> </div>
class="col-md-offset-4"
class="col-md-4"
<img src =".." class="img-responsive hidden-xs">
<img src =".." class="img-responsive visible-xs">
<a class="btn btn-large btn-default/primary/danger/link" href="#">Acha jee</a>
class=""
class=""
#107a99;
-->
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCSE, UET Peshawar</title>

    <!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/DBMSmain.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.js"></script>
    <![endif]-->
  </head>
  <body>

  <div class="intro-block">
    <div class="container">
      <div class="row">

        <div class="col-xs-2">
          <img class="img-responsive tpad img-circle" src="img/logo.jpg">
        </div>

        <div class="col-xs-8">
          <h1>Department of Computer Systems Engineering</h1>
          <h2>University of Engineering & Technology, Peshawar</h2>

         </div>

        <div class="col-xs-2">
        <?php if (!isset($_SESSION['user_id'])) : ?>
            <a href="login.php" style="text-decoration:none">
                <h4 style="color:#f2e7f2">Login | Sign-up
                    <span class="glyphicon glyphicon-user"style="color:white; font-size:20px"></span>
                </h4>
            </a>
        <?php else:
            echo $_SESSION['user_reg'];
            endif;
        ?>
        </div>
<!--
        <div class="row">
        <div class="col-xs-2 col-xs-offset-10">
          <a class="btn btn-xlarge btn-default" href="login.php">CMS</a>
          <a class="btn btn-xlarge btn-default" href="#">Library</a>
        </div> -->
        </div>


      </div>
    </div>
  </div>
  <!--END OF HEADER -->
