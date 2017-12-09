<table class="table table-sm">
  <thead>
    <tr>
      <th>Nama Menu</th>
      <th>Quantity</th>
      <th>Status Order</th>
    </tr>
  </thead>
  <tbody>
	<?php
	$menu = $adm->pickup2(	'menuList.nama,orderList_status status,orderList.qty',
							'orderList, menuList',
							"order_id = '".$_GET['id']."' &&
							menuList.menu_id = orderList.menu_id",'nama');
	$i=0;
	while($i < count($menu)){
		echo "
		<tr>
		  <td>".$menu[$i]['nama']."</td>
		  <td width='100' align='right'>".$menu[$i]['qty']."&nbsp;&nbsp;</td>
		  <td>".ucfirst($menu[$i]['status'])."</td>
		</tr>
		";
		$i++;
	}

	?>
  </tbody>
</table>
<a href="javascript:void(0)" onclick="history.go(-1)">Kembali</a>
