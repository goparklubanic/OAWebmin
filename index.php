<?php
//session_start();
//if(!isset($_SESSION['logkey'])){header("Location:./login/");}
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FRIENDS SEAFOOD RESTO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/cafe.css">
</head>
<body>
  <div class='container-fluid'>
    <div class='row'>
      <div class='col-sm-2'> <!--menu -->
        <div class='menu-group'>
          <div class='menu-title'>MENU</div>
          <div class='menu-list'>
            <li class='menu-item'><a href='./?menu=makanan'>MAKANAN</a></li>
            <li class='menu-item'><a href='./?menu=minuman'>MINUMAN</a></li>
            <li class='menu-item'><a href='./?menu=camilan'>CAMILAN</a></li>
            <li class='menu-item'><a href='./?menu=stokUpd'>STOK</a></li>
          </div>
        </div>
        
        <div class='menu-group'>
          <div class='menu-title'>ORDER</div>
          <div class='menu-list'>
            <li class='menu-item'><a href='./?menu=orderin'>MASUK</a></li>
            <li class='menu-item'><a href='./?menu=ordrout'>SELESAI</a></li>
          </div>
        </div>
        
        <div class='menu-group'>
          <div class='menu-title'>REPORT</div>
          <div class='menu-list'>
            <li class='menu-item'><a href='./?menu=rpt&cat=menus'>MENU STOCK</a></li>
            <li class='menu-item'><a href='./?menu=rpt&cat=order'>ORDERS</a></li>
            <li class='menu-item'><a href='./?menu=rpt&cat=rvnue'>REVENUE</a></li>
          </div>
        </div>

        <div class='menu-group'>
          <div class='menu-title'>LOGOUT</div>
          <div class='menu-list'>
            <li class='menu-item'><a href='./login/'>Logout</a></li>
          </div>
        </div>
        
      </div> <!--menu -->
      
      <div class='col-sm-10'> <!--content -->
      <?php include("content.php");?>
      </div> <!-- content -->
    </div> 
  </div>
</body>
</html>
