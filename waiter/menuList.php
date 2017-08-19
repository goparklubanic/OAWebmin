<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();

$menus = $wtr->pickup2('menu_id mid,nama,stok','menuList',"cat='".$_GET['cat']."'",'nama');
echo json_encode($menus);
?>
