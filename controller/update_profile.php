<?php

include "../config.php";
if (isset($_POST[('add')])) {


    $admin = new Admin();
    $std_id = $_SESSION['a_id'];
    $c_name = $_POST['c_name'];
    $c_phone = $_POST['c_phone'];
    $c_email = $_POST['c_email'];

    $c_address = $_POST['c_address'];
    $path1 = "Images/" . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $path1);

    $stmt1 = $admin->cud("UPDATE `customer` SET `customer_name`='$c_name',`customer_phone`='$c_phone',`customer_email`='$c_email',`customer_address`='$c_address',`customer_img`='$path1' WHERE `customer_id`= $std_id ", "update");
echo"<script>alert('Updated successfully');window.location='../profile.php'</script>";
}
?>