<?php
header("Access-Control-Allow-Origin: *");
require('../lib/class.waiter.inc.php');
$wtr = new waiter();

// print_r($_POST);
// Array
// (
//     [oid] => 1-191028-001
//     [set] => Array
//         (
//             [0] => Array([mid] => 2[qty] => 2)
//             [1] => Array[mid] => 8[qty] => 3)
//             [2] => Array([mid] => 7[qty] => 1)
//         )
// )
for($i = 0  ; $i < COUNT($_POST['set']) ; $i++){
	$wtr->insert('orderList','order_id,menu_id,qty',array($_POST['oid'],$_POST['set'][$i]['mid'],$_POST['set'][$i]['qty']));
}
// // echo "Menu id: ".$_POST['mid']." qty: ".$_POST['qty']." From order ".$_POST['oid'];
// // echo "<b>Order Is Received</b>";
echo "<b>Order menu Diterima</b>";

?>
