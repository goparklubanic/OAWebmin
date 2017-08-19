<?php
require("lib/class.admin.inc.php");
$adm = new admin();
foreach($_POST AS $idx=>$val){
	list($pref,$menu_id)=explode("_",$idx);
	$adm->insert('menuDropping','menu_id,qty',array($menu_id,$val));
	
}
echo "
<script>
alert('Stok sudah diupdate');
window.location='./';
</script>
";
?>

