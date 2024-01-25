<?php
include '../config.php';
$admin = new Admin();
$std_id = $_POST['std_id'];

$category = $_POST['category'];
$status = $_POST['status'];

// $path1 = "Images/" . basename($_FILES['img1']['name']);
$stmt = $admin->cud("UPDATE `category` SET `category_name`='$category',`category_status`='$status', WHERE `category_id`=$std_id ", "update");
echo"<script>alert('Updated successfully');window.location='../category_table.php'</script>";
?>