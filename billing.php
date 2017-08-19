<html>
  <head>
	  <script src="./js/jquery.min.js"></script>
	  <title>Billing</title>
	  <style>
	   html * {font-family: monospace; font-size: 10pt; border:none;
			  margin:0; padding:0;}
			  
	  @media print{
		  html * {font-family: monospace; font-size: 10px; border:none;
			  margin:0; padding:0;}
		  .hidden {display:none;}
	  }
	  </style>
  </head>
<?php
require("lib/class.admin.inc.php");
$adm = new admin();
$bill = $adm->pickup2('*','billing',"order_id='".$_GET['id']."'",'cat,nama');
$i = 0;
$total = $adm->pickup('SUM(harga) harga','billing','order_id',array($_GET['id']));
echo "<table width='100%' cellspacing='2'>";
while($i < count($bill)){
	$unitPrice=$bill[$i]['harga'] / $bill[$i]['qty'];
	echo "
	<tr>
	  <td valign='top' width='50'>".$bill[$i]['qty']."</td>
	  <td>".$bill[$i]['nama']."<br/>@".number_format($unitPrice,0,',','.')."</td>
	  <td align='right' valign='top'>".number_format($bill[$i]['harga'],0,',','.')."</td>
	</tr>
	";
	$i++;
}
echo "
	<tr>
	  <td colspan='2' align='center'>Total</td>
	  <td align='right'>".number_format($total['harga'],0,',','.')."</td>
	</tr>
";
echo "</table>";
echo "<a href='javascript:void(0)' onClick=paid('".$_GET['id']."') class='hidden'>Home</a>";
?>
<script>
function paid(id){
	$.post('lunas.php',{oid:id},function(){window.location='./?menu=orderin';});
}
</script>
  <body>
  </body>
</html>
