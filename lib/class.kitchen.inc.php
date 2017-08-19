<?php
require("class.crud.inc.php");
class kitchen extends dbcrud
{
	
	function orderin(){
		$sql = "SELECT order_id,name FROM menuOrder WHERE status='unpaid'
				ORDER BY order_id";
		$qry = $this->transact($sql);
		while($rs = $qry->fetch()){
			echo "
			<div class='orderList'>
			<p class='orderId'>
			<a href='./?oid=".$rs['order_id']."'>".$rs['order_id']."</a>
			</p>
			<p class='customer'>".$rs['name']."</p>
			</div>
			";
		} 
	}
	
}
?>
