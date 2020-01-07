<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();
$ab = $wtr->billClosed($_GET['oid']);
echo $ab;
?>
