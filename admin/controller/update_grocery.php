<?php
include '../config.php';
$admin = new Admin();


if (isset($_POST['update_grocery'])) {
    $std_id = $_POST['std_id'];
    $gname = $_POST['gname'];
    $desc = $_POST['desc'];
    $gprice = $_POST['gprice'];
    $gquantity = $_POST['gquantity'];
    $category = $_POST['category'];
    $grocery_status = $_POST['grocery_status'];
    // $path1="admin/Images/".basename($_FILES['img']['name']);
// move_uploaded_file($_FILES['img']['tmp_name'], $path1);



    $stmt = $admin->cud("UPDATE `manage_grocery` SET `grocery_name`='$gname',`description`='$desc',`price`='$gprice',`quantity`='$gquantity',`category_id`='$category' WHERE `grocery_id`=$std_id ", "update");
    echo "<script>alert('Updated successfully');window.location='../tables.php'</script>";

    if ($quantity > 0) {
        $grocery_status = 1;
    } else {
        $grocery_status = 0;
    }


}
if (isset($_POST["upd_category"])) {
    $id = $_POST['grocery_id'];
    $qty = $_POST['quantity'];
    $stmt1 = $admin->ret("SELECT * FROM `manage_grocery` WHERE `grocery_id`='$id' ");
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $qty = $qty + $row1['quantity'];

    $stmt = $admin->cud("UPDATE `manage_grocery` SET `quantity`='$qty' WHERE `grocery_id`='$id' ", 'update');
    echo "<script>alert('Updated successfully');window.location='../tables.php'</script>";
}
?>