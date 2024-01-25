<?php
include '../config.php';
$admin=new Admin();

$delete_id=$_GET['did'];
$stmt=$admin->cud("DELETE FROM `customer` WHERE `customer_id`= $delete_id","save");
echo"<script>alert('Deleted successfully');window.location='../customer_table.php'</script>";

?>