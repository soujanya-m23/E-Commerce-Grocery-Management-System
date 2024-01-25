<?php

include "../config.php";

if (isset($_POST[('place')])) {
    $admin = new Admin();
    $cid = $_SESSION['a_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $pay_type = $_POST['pay_type'];
    $trans_id = $_POST['trans_id'];
    $status = "pending";
    $shipping_status = "pending";


    $stmt1 = $admin->rcud("INSERT INTO `shipping`(`shipping_name`, `shipping_phone`, `shipping_email`,`shipping_address`,`shipping_pincode`,`shipping_status`,`customer_id`) VALUES ('$name','$phone','$email','$address','$pincode','$shipping_status','$cid')");

    echo "<script>alert('Inserted successfully');window.location='../index.php'</script>";

    $cart_stmt = $admin->ret("SELECT * FROM `add_to_cart` WHERE `customer_id`='$cid'");
    while ($row = $cart_stmt->fetch(PDO::FETCH_ASSOC)) {
        $cart_id = $row["cart_id"];
        $grocery_id = $row['grocery_id'];
        $c_price = $row['c_price'];
        $c_quantity = $row['c_quantity'];
        $total_amt = $row['total_amt'];

        // echo "<script>alert('Inserted successfully');window.location='../payment.php'</script>";
        $stmt2 = $admin->rcud("INSERT INTO `orders`(`customer_id`,`grocery_id`,`shipping_id`,`ord_price`,`ord_quantity`,`order_totamt`,`order_status`) VALUES ('$cid','$grocery_id','$stmt1','$c_price','$c_quantity','$total_amt','$status')", "save");

        $stmt3 = $admin->cud("INSERT INTO `payment`(`customer_id`,`type`,`transaction_id`,`order_id`,`total_amount`) VALUES ('$cid','$pay_type','$trans_id','$stmt2','$total_amt')", "save");

        $q_stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `manage_grocery` ON manage_grocery.grocery_id=orders.grocery_id WHERE manage_grocery.grocery_id='$grocery_id'");
        $row_stat = $q_stmt->fetch(PDO::FETCH_ASSOC);
        $quantity = $row_stat['quantity'];
        $stock = $row_stat['ord_quantity'];
        $stock = $quantity - $stock;
        $stmt = $admin->cud("UPDATE `manage_grocery` SET `quantity`='$stock' WHERE `grocery_id`='$grocery_id'", "update");

    }



    $stmt4 = $admin->cud("DELETE FROM `add_to_cart` WHERE `customer_id`='$cid'", "delete");
}


?>