<?php

include "../config.php";
if (isset($_POST[('add')])) {


    $admin = new Admin();

    $a_name = $_POST['a_name'];

    $a_email = $_POST['a_email'];
    $a_password = $_POST['a_password'];

    $stmt1 = $admin->ret("SELECT * FROM `admin` WHERE `admin_email` =' $a_email'");
    $row = $stmt1->rowCount();
    if ($row > 0) {
        echo "<scipt>alert('Email already exists');window.location='../register.php'</script>";
    } else {
        $secpassword = password_hash($a_password, PASSWORD_BCRYPT);

        $stmt = $admin->cud("INSERT INTO `admin`(`admin_name`,`admin_email`,`admin_password`) VALUES ('$a_name','$a_email','$secpassword')", "save");
        echo "<script>alert('Inserted successfully');window.location='../login.php'</script>";
    }
}
?>