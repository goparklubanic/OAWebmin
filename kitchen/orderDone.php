<?php
require('../lib/class.kitchen.inc.php');
$wtr = new kitchen();
$x = 0;
for($i = 0 ; $i < count($_POST['olid']) ; $i++ ){
	//$data = $wtr->pickup('*','orderList','orderList_id',array($_POST['olid'][$i]));
	$wtr->update('orderList','orderList_status',array('delivered',$_POST['olid'][$i]),'orderList_id');
	$x++;
}
echo $x." items of order delivered";
?>

