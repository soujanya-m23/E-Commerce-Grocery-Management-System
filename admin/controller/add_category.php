<?php

include "../config.php";
if (isset($_POST[('add_category')])) {


    $admin = new Admin();

    $category = $_POST['category'];
    $status = $_POST['status'];
    $path1="Images/".basename($_FILES['img1']['name']);
    move_uploaded_file($_FILES['img1']['tmp_name'], $path1);


    $stmt = $admin->cud("INSERT INTO `category`(`category_name`, `category_status`,`category_img`) VALUES ('$category','$status','$path1')", "save");
     echo "<script>alert('Inserted successfully');window.location='../category_table.php'</script>";
}
?>