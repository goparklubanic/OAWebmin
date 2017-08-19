<?php
require("lib/class.admin.inc.php");
$adm = new admin();

if($_GET['menu']=='makanan'){
	
	echo "
	<div class='menu-title'>Daftar Makanan
	<span class='float-right'>
	<a class='btn btn-default' onClick=updMenu(0,'Makanan')>+ Makanan</a>
	</span>
	</div>";
	echo "<table class='table'>";
	menuTableHead();
	$adm->listMenu('Makanan');
	echo "</table>";
}

if($_GET['menu']=='minuman'){
	echo "<div class='menu-title'>Daftar Minuman
	<span class='float-right'>
	<a class='btn btn-default' onClick=updMenu(0,'Minuman')>+ Minuman</a>
	</span>
	</div>";
	echo "<table class='table'>";
	menuTableHead();
	$adm->listMenu('Minuman');
	echo "</table>";
}

if($_GET['menu']=='camilan'){
	echo "<div class='menu-title'>Daftar Snack
	<span class='float-right'>
	<a class='btn btn-default' onClick=updMenu(0,'Camilan')>+ Camilan</a>
	</span>
	</div>";
	echo "<table class='table'>";
	menuTableHead();
	$adm->listMenu('Camilan');
	echo "</table>";
}

if($_GET['menu']=='stokUpd'){
	include("stokUpdate.php");
}


if($_GET['menu']=='orderin'){
	include("orderin.php");
}

if($_GET['menu']=='ordrout'){
	include("orderout.php");
}

if($_GET['menu']=='menuOrder'){
	include("menuOrder.php");
}

if($_GET['menu']=='rpt'){
	include("report.php");
}


function menuTableHead(){
	echo"
	<thead>
	<tr>
    <th>ID</th>
    <th>NAMA</th>
    <th>HARGA</th>
    <th>DISKON</th>
    <th>FOTO</th>
    <th>MENU HARI INI</th>
    <th>STOK</th>
    <th>KONTROL</th>
	</tr>
	</thead>
	";
}


?>

<!-- Modal -->
<div id="menuListModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Menu</h4>
      </div>
      <div class="modal-body" id="modalContent">
        
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div-->
    </div>

  </div>
</div>

<script>
function updMenu(id,cat){
	
	$('#menuListModal').modal('show');
	var opr;
	if(id == 0){ opr = 'ins'; }else { opr = 'upd'; }
	$.ajax({url:'form-menu.php?opr='+opr+'&cat='+cat+'&mid='+id,success:function(form){
		$('#modalContent').html(form);
	}});
	
}

function rmvMenu(id){
	
	var yqn = confirm("Menu dengan id"+id+" akan dihapus ?");
	if(yqn == true){
		$.post('act-menu.php',{
			opr:'rmv',
			mid:id
		},function(){
			alert("Menu Telah dihapus");
		});
	}
}

</script>
