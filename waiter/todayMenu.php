<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();

$menus = $wtr->todayMenu();
echo json_encode($menus);
?>
