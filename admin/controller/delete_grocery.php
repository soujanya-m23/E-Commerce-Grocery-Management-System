<?php
include '../config.php';
$admin=new Admin();

$delete_id=$_GET['did'];
$stmt=$admin->cud("DELETE FROM `manage_grocery` WHERE `grocery_id`= $delete_id","save");
echo"<script>alert('Deleted successfully');window.location='../tables.php'</script>";

?>