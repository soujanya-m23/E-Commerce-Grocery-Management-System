<?php

include "../config.php";


$admin = new Admin();


$cid = $_SESSION['a_id'];
$gid = $_POST['g_id'];
$price= $_POST['price'];
$quantity=$_POST['quantity'];






$stmt = $admin->cud("INSERT INTO `add_to_cart`(`grocery_id`,`quantity`,`customer_id`,`price`) VALUES ('$gid','$quantity','$cid','$price')", "save");
echo "<script>alert('Inserted successfully');window.location='../cart.php'</script>";

?>