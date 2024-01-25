<?php
include "../config.php";
$admin = new Admin();
if (isset($_POST[('login')])) {

    $a_email = $_POST['a_email'];
    $a_password = $_POST['a_password'];
    $stmt = $admin->ret("SELECT * FROM `admin` WHERE `admin_email`= '$a_email'");
    $row = $stmt->rowCount();
    if ($row > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbpass = $row['admin_password'];
        if (password_verify($a_password, $dbpass)) {

            $_SESSION['a_id']=$row['admin_id'];
            echo "<script>alert('Login Successful');window.location='../index.php'</script>";
        } else {
            echo "<script>alert('Email or password is incorrect');window.location='../pages/samples/login.php'</script>";
        }
    } else {
     echo "<script>alert('Email or password is incorrect');window.location='../pages/samples/login.php'</script>";
    }
}


?>