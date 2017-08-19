<?php
require('class.crud.inc.php');
class waiter extends dbcrud
{
	
	function newOrderId(){
		$now=date('ymd');
		$sql = "SELECT COUNT(order_id) orderNumber FROM menuOrder
				WHERE order_id LIKE '%-$now-%'";
		$qry = $this->transact($sql);
		$rs = $qry->fetch();
		$orderNumber=$rs['orderNumber']+1;
		echo $now.'-'.sprintf("%03d",$orderNumber);
	}
	
	function menuReturn($olid){
		$sql = "UPDATE menuList 
				SET stok = stok + (SELECT qty FROM orderList WHERE orderList_id = '$olid') 
				WHERE menu_id = (SELECT menu_id FROM orderList WHERE orderList_id = '$olid')";
		$qry = $this->transact($sql);
	}
	
	
}
?>
