<?php
include '../config.php';
$admin=new Admin();

echo $delete_id=$_GET['did'];
$stmt=$admin->cud("DELETE FROM `add_to_cart` WHERE `cart_id`= '$delete_id'","deleted");
echo"<script>alert('Deleted successfully');window.location='../../cart.php'</script>";

?>