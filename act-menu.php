<?php
require("lib/class.admin.inc.php");
$menu = new admin();
/*  [opr] => upd [mid] => 003 [cat] => Makanan 
	[nama] => Ayam Geprek Cheese [harga] => 15000 [diskon] => 5 
	[namaFoto] => mangkok.png 
	[mhi] => 1 )
*/
if($_POST['opr']=='ins'){
	$sets = 'cat,nama,harga,diskon,photo,todayMenu';
	$data = array($_POST['cat'],$_POST['nama'],$_POST['harga'],
			($_POST['diskon']/100),$_POST['namaFoto'],$_POST['mhi']);
	$menu->insert('menuList',$sets,$data);
	alert("Menu Baru Berhasil Ditambahkan","./?menu=".strtolower($_POST['cat']));
}

if($_POST['opr']=='upd'){
	$sets = 'cat,nama,harga,diskon,photo,todayMenu';
	$data = array($_POST['cat'],$_POST['nama'],$_POST['harga'],
			($_POST['diskon']/100),$_POST['namaFoto'],$_POST['mhi'],
			$_POST['mid']);
	$tkey = 'menu_id';
	$menu->update('menuList',$sets,$data,$tkey);
	alert("Menu Berhasil Dimutakhirkan","./?menu=".strtolower($_POST['cat']));
}

if($_POST['opr']=='rmv'){
	$menu->delete('menuList','menu_id',array($_POST['mid']));
}

function alert($message,$location){
	echo
	"
	<script>
	  alert('".$message."');
	  window.location='".$location."';
	</script>
	";
}
?>
