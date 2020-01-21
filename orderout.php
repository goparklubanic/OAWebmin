<div class="menu-title">
	<h4>ORDER SELESAI</h4>
</div>
<table class='table table-sm'>
  <thead>
    <tr>
      <th>TANGGAL</th>
      <th>ORDER ID</th>
      <th>NOMOR MEJA</th>
      <th>CUSTOMER</th>
      <th>BILLING</th>
      <th>D/R RATIO</th>
    </tr>
  </thead>
  <tbody>
	<?php
	
	$order = $adm->orderOut();
	
	$i=0;
	while($i < count($order)){
		list($meja,$tgl,$urut)=explode("-",$order[$i]['order_id']);
		$tanggal = substr($tgl,4,2).'-'.substr($tgl,2,2).'-'.substr($tgl,0,2);
		$acc = $adm->accomplishment($order[$i]['order_id']);
		if($acc['Delivered']==''){$acc['Delivered']='0';}
		if($acc['Received']==''){$acc['Received']='0';}
		echo "
		<tr>
		  <td>".$tanggal."</td>
		  <td>".$urut."</td>
		  <td>".$meja."</td>
		  <td>".$order[$i]['name']."</td>
		  <td>".number_format($order[$i]['harga'],0,',','.')."</td>
		  <td>".$acc['Delivered'].'/'.($acc['Received']+$acc['Delivered'])."
			<a href='./?menu=menuOrder&id=".$order[$i]['order_id']."'>Detil</a>
		  </td>
		</tr>
		";
		$i++;
	}
	?>
  </tbody>
</table>
	
