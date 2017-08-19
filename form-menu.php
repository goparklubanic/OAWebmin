<!DOCTYPE html>
<html lang="en">
<head>
  <title>CAFE PASHA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/cafe.css">
</head>
<body>
<?php
if($_GET['mid'] > 0){
	require("lib/class.admin.inc.php");
	$adm = new admin();
	$menu = $adm->pickup('*','menuList','menu_id',array($_GET['mid']));
	
	$nama   = $menu['nama'];
	$harga  = $menu['harga'];
	$diskon = $menu['diskon'];
	$photo  = $menu['photo'];
}else{
	$nama   = '';
	$harga  = '';
	$diskon = '';
	$photo  = '';
}

?>
<form action="act-menu.php" method="post" class="form-horizontal">
<input type="hidden" name="opr" value="<?php echo $_GET['opr']?>" />
<input type="hidden" name="mid" value="<?php echo $_GET['mid']?>" />
<input type="hidden" name="cat" value="<?php echo $_GET['cat']?>" />
<div class="form-group">
  <label class="col-sm-3">KATEGORY</label>
  <!--select class="form-control" name='cat'>
    <option value="Makanan">Makanan</option>
    <option value="Minuman">Minuman</option>
    <option value="Camilan">Camilan</option>
  </select-->
  <div class="col-sm-9">
    <input type="text" disabled class="form-control" value="<?php echo $_GET['cat']; ?>" />
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3">NAMA </label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" />
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3">HARGA</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="harga" value="<?php echo $harga; ?>" />
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3">DISKON</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="diskon" value="<?php echo $diskon; ?>" />
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3">NAMA FOTO</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="namaFoto" value="<?php echo $photo; ?>" />
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3">MENU HARI INI</label>
  <div class="col-sm-9">
    <select name="mhi" class='form-control'>
      <option value='0' selected>Bukan</option>
      <option value='1'>Ya</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class='col-sm-3'>&nbsp;</label>
  <div class='col-sm-9'>
    <input type="submit" class="btn btn-default" value="Simpan" />
  </div>
</div>
</form>
</body>
</html>

