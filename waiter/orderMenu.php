<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();

for($i = 0 ; $i < count($_POST['mid']) ; $i++)
{
	list($pref,$mid)=explode("-",$_POST['mid'][$i]);
	$qty=$_POST['qty'][$i];
	$wtr->insert('orderList','order_id,menu_id,qty',array($_POST['oid'],$mid,$qty));
	echo "<b>Your Order Is Received</b>";
}
?>
