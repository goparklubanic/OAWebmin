<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();
$wtr->insert('orderList','order_id,menu_id,qty',array($_POST['oid'],$_POST['mid'],$_POST['qty']));
//echo "Menu id: ".$_POST['mid']." qty: ".$_POST['qty']." From order ".$_POST['oid'];
// echo "<b>Order Is Received</b>";
echo "<b>Order menu ".$_POST['mid']." Qtt:".$_POST['qty']." Received</b>";
/*
for($i = 0 ; $i < count($_POST['mid']) ; $i++)
{
	list($pref,$mid)=explode("-",$_POST['mid'][$i]);
	$qty=$_POST['qty'][$i];
	$wtr->insert('orderList','order_id,menu_id,qty',array($_POST['oid'],$mid,$qty));
	echo "<b>Your Order Is Received</b>";
}
*/
?>
