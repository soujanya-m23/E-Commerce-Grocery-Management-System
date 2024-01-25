<?php

include "../config.php";
$admin = new Admin();
if (isset($_POST[('login')])) {
    $c_email = $_POST['c_email'];
    $c_password = $_POST['c_password'];
    $stmt = $admin->ret("SELECT * FROM `customer` WHERE `customer_email` ='$c_email'");
    $row = $stmt->rowCount();
    if ($row > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbpass = $row['customer_password'];
        if (password_verify($c_password, $dbpass)) {
            $_SESSION['a_id']=$row['customer_id'];
            echo"<script>alert('Login Successful');window.location='../index.php'</script>";
        } else {
            echo "<script>alert('Email or password is incorrect');window.location='../login.php'</script>";
        }
    } else {
        echo "<script>alert('Email or password is incorrect');window.location='../login.php'</script>";
    }

}

?>