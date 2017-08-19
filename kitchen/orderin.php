<h3>ORDER MASUK</h3>
<table class='table table-sm'>
  <thead>
    <tr>
      <th>TANGGAL</th>
      <th>ORDER ID</th>
      <th>NOMOR MEJA</th>
      <th>CUSTOMER</th>
      <th>BILLING</th>
      <th>ACCOMPLISHMENT</th>
    </tr>
  </thead>
  <tbody>
	<?php
	$order = $adm->pickup2('menuOrder.*,sum(harga) harga','menuOrder,billing',
							"billing.order_id=menuOrder.order_id && status = 'unpaid'",
							'order_id');
	$i=0;
	while($i < count($order)){
		list($meja,$tgl,$urut)=explode("-",$order[$i]['order_id']);
		$tanggal = substr($tgl,4,2).'-'.substr($tgl,2,2).'-'.substr($tgl,0,2);
		$acc = $adm->accomplishment($order[$i]['order_id']);
		if($acc['Delivered']==''){$acc['Delivered']='0';}
		echo "
		<tr>
		  <td>".$tanggal."</td>
		  <td>".$urut."</td>
		  <td>".$meja."</td>
		  <td>".$order[$i]['name']."</td>
		  <td>".number_format($order[$i]['harga'],0,',','.')."</td>
		  <td>".$acc['Delivered'].'/'.$acc['Received']."
			<a href='./?menu=menuOrder&id=".$order[$i]['order_id']."'>Detil</a>
		  </td>
		</tr>
		";
		$i++;
	}
	?>
  </tbody>
</table>
	
