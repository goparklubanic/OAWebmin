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

	public function activeBilling(){
		$sql = "SELECT billing.order_id, menuOrder.name customer , SUM(harga) tagihan FROM billing, menuOrder WHERE menuOrder.order_id = billing.order_id &&menuOrder.status = 'unpaid' GROUP BY billing.order_id ORDER BY billing.order_id";
		$qry = $this->transact($sql);
		$ab = [];
		while( $rs = $qry->fetch()){ array_push($ab,$rs); }
		return $ab;
	}

	public function billDetail($id){
		$sql = "SELECT nama,qty,harga FROM billing WHERE order_id = '$id' ORDER BY cat,nama";
		$qry = $this->transact($sql);
		$bd = [];
		$total = 0;
		while( $rs = $qry->fetch()){ array_push($bd,$rs); $total+=$rs['harga']; }
		return array('data'=>$bd,'total'=>$total);
	}
	
	
}
?>
