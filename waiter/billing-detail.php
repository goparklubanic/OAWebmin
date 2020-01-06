<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();
$ab = $wtr->billDetail($_GET['oid']);
echo json_encode($ab);
?>
