<?php
require('class.crud.inc.php');
class admin extends dbcrud
{
	
	function listMenu($cat){
		$menu = $this->pickup2('*','menuList',"cat='".$cat."'",'nama');
		$i = 0 ;
		while($i < count($menu)){
		echo "
		<tr>
		  <td>".$menu[$i]['menu_id']."</td>
		  <td>".$menu[$i]['nama']."</td>
		  <td align='right'>".number_format($menu[$i]['harga'],0,',','.')."</td>
		  <td align='right'>".$menu[$i]['diskon']."</td>
		  <td>".$menu[$i]['photo']."</td>
		  <td>".$menu[$i]['todayMenu']."</td>
		  <td>".$menu[$i]['stok']."</td>
		  <td>
			<a href='javascript:void(0)' onClick=updMenu('".$menu[$i]['menu_id']."','".$cat."')>Update</a>
			<a href='javascript:void(0)' onClick=rmvMenu('".$menu[$i]['menu_id']."')>Delete</a>
		  </td>
		</tr>
		";
		$i++;
		}
	}
	
	function menuStockForm($cat){
		$menu = $this->pickup2('menu_id,nama','menuList',"cat='$cat'",'nama');
		$i=0;
		
		while($i < count($menu) ){
			$nomor = $i+1;
			echo "
			<tr>
			  <td align='right'>".$nomor.".</td>
			  <td>".$menu[$i]['nama']."</td>
			  <td><input type='number' name='stock_".$menu[$i]['menu_id']."' size='6' value='0'
			  style='text-align: right; padding-right: 2px;' /></td>
			</tr>";
			$i++;
		}
	}
	
	function orderIn(){
		$sql = "SELECT menuOrder.*, SUM(harga) harga FROM menuOrder,billing 
				WHERE billing.order_id = menuOrder.order_id &&
				status='unpaid' GROUP BY menuOrder.order_id";
		$oin = array();
		$qry = $this->transact($sql);
		while($rs = $qry->fetch()){
			array_push($oin,$rs);
		}
		return($oin);
	}
	
	function orderOut(){
		$now = date(ymd);
		$sql = "SELECT menuOrder.*, SUM(harga) harga FROM menuOrder,billing 
				WHERE billing.order_id = menuOrder.order_id && 
				billing.order_id LIKE '%$now%' && status='paid' 
				GROUP BY menuOrder.order_id";
		$oin = array();
		$qry = $this->transact($sql);
		while($rs = $qry->fetch()){
			array_push($oin,$rs);
		}
		return($oin);
	}
	
	function accomplishment($oid){
		$sql = "
		SELECT (SELECT SUM(qty) FROM orderList 
				WHERE orderList_status ='received' && order_id='$oid') Received, 
			   (SELECT SUM(qty) FROM orderList 
				WHERE orderList_status ='delivered' && order_id='$oid') Delivered ";
		$qry = $this->transact($sql);
		$rs = $qry->fetch();
		return($rs);
		$qry = NULL;
	}
	
	function sisaStok(){
		
		$sql = "SELECT cat,nama,harga,stok FROM menuList ORDER BY cat,nama";
		$qry = $this->transact($sql);
		while($rs = $qry->fetch()){
			echo "
			<tr>
			  <td>".$rs['cat']."</td>
			  <td>".$rs['nama']."</td>
			  <td align='right'>".number_format($rs['harga'],0,',','.')."</td>
			  <td align='right'>".$rs['stok']."</td>
			</tr>
			";
		}
		$qry = NULL;
		
	}
	
	
	function orderList($start='0'){
		$now = date('ymd');
		$sql = "SELECT order_id,nama,qty FROM orderList,menuList 
				WHERE order_id LIKE '%$now%' && 
				menuList.menu_id = orderList.menu_id 
				ORDER BY order_id DESC
				LIMIT $start,".rows;
		$qry = $this->transact($sql);
		while($rs = $qry->fetch()){
			list($meja,$tgl,$oid)=explode("-",$rs['order_id']);
			echo "
			<tr>
			  <td>".$oid."</td>
			  <td>".$meja."</td>
			  <td>".$rs['nama']."</td>
			  <td align='right'>".$rs['qty']."</td>
			</tr>
			";
		}
	}
	
	function revenue($start=0){
		$now = date('ymd');
		$sql ="SELECT order_id,sum(harga) harga FROM billing
			   WHERE order_id LIKE '%$now%'
			   GROUP BY order_id ORDER BY order_id DESC";
		$qry = $this->transact($sql);
		while($rs = $qry->fetch()){
			list($meja,$tgl,$oid)=explode("-",$rs['order_id']);
			echo "
			<tr>
			  <td>".$oid."</td>
			  <td>".$meja."</td>
			  <td align='right'>".number_format($rs['harga'],0,',','.')."</td>
			</tr>";
			
		}
	}
	
}
?>
