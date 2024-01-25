<?php

include "../config.php";

if(isset($_POST['add_feedback'])) {
    $admin = new Admin();
    $name= $_POST["name"];
    $feedback= $_POST["feedback"];
    $f_gid=$_POST['f_gid'];
    $cid = $_SESSION['a_id'];

    $stmt5= $admin->cud("INSERT INTO `feedback`(`customer_id`,`grocery_id`,`feedback_msg`)VALUES('$cid','$f_gid','$feedback')","save");
}
?>