<?php
include '../config.php';
$admin=new Admin();

$delete_id=$_GET['did'];
$stmt=$admin->cud("DELETE FROM `category` WHERE `category_id`= $delete_id","save");
echo"<script>alert('Deleted successfully');window.location='../category_table.php'</script>";

?>