<?php
if($_GET['cat']=='menus'){
	
	echo "
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
