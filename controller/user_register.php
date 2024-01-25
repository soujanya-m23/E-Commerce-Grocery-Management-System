<?php

include "../config.php";
if(isset($_POST[('add')])){


$admin=new Admin();

$c_name=$_POST['c_name'];
$c_phone=$_POST['c_phone'];
$c_email=$_POST['c_email'];
$c_password=$_POST['c_password'];
$c_address=$_POST['c_address'];
$c_pincode=$_POST['c_pincode'];
$stmt1= $admin->ret("SELECT * FROM `customer` WHERE `customer_email` =' $c_email'");
$row=$stmt1->rowCount();
if($row>0){
    echo "<scipt>alert('Email already exists');window.location='../register.php'</script>";
}
else {
$secpassword=password_hash($c_password,PASSWORD_BCRYPT);

$stmt=$admin->cud("INSERT INTO `customer`(`customer_name`, `customer_phone`, `customer_email`,`customer_password`,`customer_address`,`c_pincode`) VALUES ('$c_name','$c_phone','$c_email','$secpassword','$c_address','$c_pincode')","save");
echo"<script>alert('Inserted successfully');window.location='../login.php'</script>";
}
}
?>
