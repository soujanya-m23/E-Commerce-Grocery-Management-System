<?php
include '../config.php';
$admin =new Admin();
session_destroy();
unset($_SESSION['a_id'] );
echo"<script>alert('Logout succesful');window.location='../login.php'</script>";
?>