<?php
include '../config.php';
$admin = new Admin();
if(isset($_GET['ship_id']) && isset($_GET['ship_status'])) {
    $shipid = $_GET['ship_id'];
    $shipstatus = $_GET['ship_status'];
    if($shipstatus == "pending") {
        $shipstatus = "accepted";
    } elseif($shipstatus == "accepted") {
        $shipstatus = "packed";
    } elseif($shipstatus == "packed") {
        $shipstatus = "delivered";

    } else{
        $shipstatus = "delivered";
    }
    $stmt = $admin->cud("UPDATE `shipping` SET `shipping_status`= '$shipstatus' WHERE `shipping_id`='$shipid'", "update");
    echo "<script>window.location='../order_form.php'</script>";
}

?>