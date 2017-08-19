<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');

$wtr = new waiter();
$unpaid=$wtr->pickup2('*','menuOrder',"status='unpaid'",'order_id');
echo json_encode($unpaid);
?>
