<?php
if($_GET['cat']=='menus'){
	
	echo "
	<div class='menu-title'> <h4>Laporan Menu</h4></div>
	<table class='table'>
	  <thead>
	    <tr>
	      <th>KATEGORI</th>
	      <th>NAMA MENU</th>
	      <th>HARGA</th>
	      <th>SISA STOK</th>
	    </tr>
	  </thead>
	  <tbody>
	  ";
	  $adm->sisaStok();
	echo "
	  </tbody>
	</table>
	";
	
}

if($_GET['cat']=='order'){
	
	echo "
	<div class='menu-title'> <h4>Laporan Order</h4></div>
	<table class='table'>
	  <thead>
	    <tr>
	      <th>NOMOR ORDER</th>
	      <th>NOMOR MEJA</th>
	      <th>MENU</th>
	      <th width='100'>BANYAKNYA</th>
	    </tr>
	  </thead>
	  <tbody>
	  ";
	  $adm->orderList(0);
	echo "
	  </tbody>
	</table>
	";
	
}

if($_GET['cat']=='rvnue'){
	
	echo "
	<div class='menu-title'> <h4>Laporan Pemasukan</h4></div>
	<table class='table'>
	  <thead>
	    <tr>
	      <th>NOMOR ORDER</th>
	      <th>NOMOR MEJA</th>
	      <th>HARGA</th>
	    </tr>
	  </thead>
	  <tbody>
	  ";
	  $adm->revenue(0);
	echo "
	  </tbody>
	</table>
	";
	
}

?>
