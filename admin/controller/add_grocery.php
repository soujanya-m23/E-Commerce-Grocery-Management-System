<?php

include "../config.php";
if(isset($_POST[('add_grocery')])){


$admin=new Admin();

$gname=$_POST['gname'];
$desc=$_POST['desc'];
$gprice=$_POST['gprice'];
$gquantity=$_POST['gquantity'];
$category=$_POST['category'];
$path1="Images/".basename($_FILES['img']['name']);
move_uploaded_file($_FILES['img']['tmp_name'], $path1);


$stmt=$admin->cud("INSERT INTO `manage_grocery`(`grocery_name`, `description`,`price`, `quantity`,`category_id`,`grocery_img`) VALUES ('$gname','$desc','$gprice','$gquantity','$category','$path1')","save");
echo"<script>alert('Inserted successfully');window.location='../tables.php'</script>";
}
?>

