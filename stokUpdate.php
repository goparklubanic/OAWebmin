<?php
echo "<div class='menu-title'><h3>STOCK UPDATE</h3></div>";
echo "
<div>
<ul class='nav nav-tabs'>
  <li><a href='./?menu=stokUpd&cat=makanan'>Makanan</a></li>
  <li><a href='./?menu=stokUpd&cat=minuman'>Minuman</a></li>
  <li><a href='./?menu=stokUpd&cat=camilan'>Snack</a></li>
</ul>
</div>
";
?>
<table class='table table-sm'>
<thead>
	<tr>
	  <th width="50">Nomor</th>
	  <th>Menu</th>
	  <th>Stok Masuk</th>
	</tr>
</thead>
<form action="act-stokMenu.php?opr=nmb" method="post">
<tbody>
	<?php
	switch($_GET['cat']){
		case 'makanan': $cat = "Makanan"; break;
		case 'minuman': $cat = "Minuman"; break;
		case 'camilan': $cat = "Camilan"; break;
	}
	$adm->menuStockForm($cat);
	?>
	<tr>
	  <td colspan='2'>&nbsp;</td>
	  <td>
		  <input type="submit" value="Update" />
	  </td>
	</tr>
</tbody>
</form>
</table>
