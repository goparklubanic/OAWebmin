<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();

$wtr->insert('menuOrder','order_id,name',array($_POST['oid'],$_POST['cus']));
?>
