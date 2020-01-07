<?php
//session_start();
//if(!isset($_SESSION['logkey'])){header("Location:./login/");}
error_reporting(E_ALL & ~E_NOTICE);
require("../lib/class.kitchen.inc.php");
$cook = new kitchen();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FRIENDS SEAFOOD RESTO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cafe.css">
</head>
<body>
  <div class='container-fluid'>
    <div class='col-sm-4'>
    <?php $cook->orderin(); ?>
    </div>
    <div class='col-sm-8'>
      <?php 
      include('menuOrder.php');
      ?>
      <a href="../login/">Logout</a>
    </div>
  </div>
</body>
</html>
