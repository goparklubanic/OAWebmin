<?php
require('lib/class.admin.inc.php');
$adm = new admin();
$adm->update('menuOrder','status',array('paid',$_POST['oid']),'order_id');
?>
