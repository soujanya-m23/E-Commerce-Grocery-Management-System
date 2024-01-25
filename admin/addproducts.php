<?php
include '../config.php';
$admin=new Admin();


if(isset($_POST['button'])){
	$pname=$_POST['pname'];
	$cid=$_POST['cid'];
	$weight=$_POST['weight'];
	$qty=$_POST['qty'];
	$discount=$_POST['discount'];
	$oid=$_POST['oid'];
	$price=$_POST['price'];
	$desc=$_POST['desc'];
	$path1="cus_image/".basename($_FILES['img1']['name']);
move_uploaded_file($_FILES['img1']['tmp_name'], $path1);

    $path2="cus_image/".basename($_FILES['img2']['name']);
move_uploaded_file($_FILES['img2']['tmp_name'], $path2);

$stmt=$admin->cud("INSERT INTO `cake`(`ck_name`, `c_id`, `price`, `ck_weight`,`ck_discount`, `ck_image1`, `ck_image2`, `oc_id`, `ck_qty`,`ck_desc`) VALUES ('$pname','$cid','$price','$weight','$discount','$path1','$path2','$oid','$qty','$desc')","saved");



	
	echo "<script>
	alert('Product Added successfully');
	window.location.href='../admin/template/view_products.php';
	</script>";

}




?>