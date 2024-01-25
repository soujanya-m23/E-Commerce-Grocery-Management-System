<?php

include "../config.php";
$admin = new Admin();

if (isset($_GET['g_id'])) {

    $cid = $_SESSION['a_id'];
    $gid = $_GET['g_id'];
    //$price = $_POST['price'];
    $quantity = 1;
    $stmt = $admin->ret("SELECT * FROM `manage_grocery` WHERE `grocery_id`='$gid'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $price = $row['price'];
    $c_stmt = $admin->ret("SELECT * FROM `add_to_cart` where `grocery_id` ='$gid'");
    $num = $c_stmt->rowCount();
    if ($num > 0) {
        $c_row = $c_stmt->fetch(PDO::FETCH_ASSOC);
        $quantity = $c_row['c_quantity'];
        $quantity += 1;
        $total_amt = $quantity * $price;

        $stmt = $admin->cud("UPDATE `add_to_cart` SET `c_quantity`='$quantity', `total_amt`='$total_amt' WHERE `grocery_id`='$gid'", "update");

        echo "<script>alert('Grocery updated successfully');window.location='../cart.php'</script>";

    } else {

        $stmt = $admin->cud("INSERT INTO `add_to_cart`(`grocery_id`,`c_quantity`,`customer_id`,`c_price`,`total_amt`) VALUES ('$gid','1','$cid','$price','$price')", "save");
        echo "<script>alert('Inserted successfully');window.location='../cart.php'</script>";
    }

}

if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $quantity = $_GET['quantity'];
    $price = $_GET['price'];
    $total_amt = $quantity * $price;


    $stmt = $admin->cud("UPDATE `add_to_cart` SET `c_quantity`='$quantity', `total_amt`='$total_amt' WHERE `cart_id`='$id'", "update");

    echo "<script>window.location='../cart.php'</script>";

}

?>


<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Products</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>

                <th scope="col">Quantity</th>

                <th scope="col">Total</th>


            </tr>
        </thead>
        <tbody>

            <?php
            $stmt = $admin->ret("SELECT * FROM `add_to_cart` INNER JOIN `manage_grocery` ON manage_grocery.grocery_id=add_to_cart.grocery_id");
            $g_total = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $g_total = $g_total + $row["total_amt"];
                ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="admin/controller/<?php echo $row['grocery_img']; ?>"
                                class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                        </div>
                    </td>
                    <td>
                        <p class="mb-0 mt-4" id="grocery_name">
                            <?php echo $row['grocery_name']; ?>
                        </p>
                    </td>
                    <td>
                        <p class="mb-0 mt-4">
                            <?php echo $row['c_price'] ?>
                        </p>
                        <input type="hidden" name="price" class="iprice" value="<?php echo $row['c_price'] ?>">
                    </td>
                    <td class="quantity">

                        <div class="input-group mb-3">
                            <button id="minus"
                                onclick="sub(<?php echo $row['cart_id']; ?>,<?php echo $row['c_quantity']; ?>,<?php echo $row['c_price']; ?>)"
                                class="btn btn-sm btn-minus rounded-circle bg-light border mb-0 mt-4">
                                <i class="fa fa-minus"></i>

                            </button>

                            <input class="form-control-sm text-center border-0 mb-0 mt-4" type="text" id="g_quantity"
                                class="iquantity" name="quantity" value="<?php echo $row['c_quantity']; ?>">

                            <button id="add" class="btn btn-sm btn-plus rounded-circle bg-light border mb-0 mt-4"
                                onclick="add(<?php echo $row['cart_id']; ?>,<?php echo $row['c_quantity']; ?>,<?php echo $row['c_price']; ?>)">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                    </td>
                    <td class="itotal">
                        <p class=" mb-0 mt-4">
                            <?php echo $row['total_amt'] ?>
                        </p>
                    </td>

                    <td>
                        <a href="./admin/controller/delete_cart.php?did=<?php echo $row['cart_id']; ?>"
                            class="btn btn-md rounded-circle bg-light border mt-4">
                            <i class="fa fa-times text-danger"></i>
                        </a>
                    </td>
                </tr>

                <?php
            }
            ?>

        </tbody>
    </table>
</div>
<div class="row g-4 justify-content-end">
    <div class="col-8"></div>
    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
        <div class="bg-light rounded">
            <div class="p-4">
                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>


            </div>

            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                <h5 class="mb-0 ps-4 me-4">Total</h5>
                <p class="mb-0 pe-4" id="gtotal" name="amt">
                    <?php echo $g_total; ?>
                </p>
            </div>
            <a href="chackout.php" name="checkout"
                class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4 "
                type="button">Proceed Checkout</a>
        </div>
    </div>
</div>
