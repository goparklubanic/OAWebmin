<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();
$oid = $_GET['oid'];
$cat = $_GET['cat'];
if($cat == 'all'){
	$billing = $wtr->pickup('SUM(harga) harga','billing','order_id',array($oid));
	echo "Grand Total<span class='price'>".number_format($billing['harga'],0,',','.')."</span>";
}else{
	$billing = $wtr->pickup2('orderList_id oid,qty,nama,harga','billing',"order_id='$oid' && cat='$cat'",'nama');
	$bill = array();
	$i=0;
	while($i < count($billing)){
		$data = array('oid'=>$billing[$i]['oid'],
					  'qty'=>$billing[$i]['qty'],
					  'nama'=>$billing[$i]['nama'],
					  'harga'=>number_format($billing[$i]['harga'],0,',','.')
		);
		array_push($bill,$data);
		$i++;
	}
	echo json_encode($bill);
}
?>
