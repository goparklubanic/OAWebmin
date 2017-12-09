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
	$menu = $cook->pickup2(	'orderList_id olid, menuList.nama,
							 orderList_status status,orderList.qty',
							'orderList, menuList',"order_id='".$_GET['oid']."' &&
							 menuList.menu_id = orderList.menu_id",'nama');
	$i=0;
	while($i < count($menu)){
		if( $menu[$i]['status'] == 'received'){
			$ordStatus = "<input type='checkbox' name='olid'
			value='".$menu[$i]['olid']."'> Received";
		}else{
			$ordStatus = "Done";
		}
		echo "
		<tr>
		  <td>".$menu[$i]['nama']."</td>
		  <td width='100' align='right'>".$menu[$i]['qty']."&nbsp;&nbsp;</td>
		  <td>".$ordStatus."</td>
		</tr>
		";
		$i++;
	}

	?>
    <tr>
      <td colspan='2' align='right'>&nbsp;</td>
      <td>
        <button style="width: 120px" onClick='orderDone()'>Done</button>
      </td>
    </tr>
  </tbody>
</table>
<div>
  <cener>
    <a href="./">Kembali</a>
  </cener>
</div>
<div id="testPost"></div>

<script>
function orderDone(){
	var om = {};
		om.id = [];

		$("input:checkbox").each(function() {
			if ($(this).is(":checked")) {
				var olid = $(this).val();
				om.id.push(olid);
			}
		});

		$.post('orderDone.php',{
			olid: om.id
		},function(result){
			//$("#testPost").html(result);
			alert(result);
			location.reload();
		});
}
</script>
