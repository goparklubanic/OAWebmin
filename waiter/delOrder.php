<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');

$wtr = new waiter();
$wtr->menuReturn($_POST['moid']);
$wtr->delete('orderList','orderList_id',$_POST['moid']);
?>
