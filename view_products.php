<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['a_id'];
$dat = $_GET['date'];
$stmt = $admin->ret("SELECT * FROM `customer` WHERE `customer_id` ='$sid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['a_id'])) {
    $admin->redirect('login');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar start -->
    <?php
    include 'navbar.php';
    ?>
    <!-- Navbar End -->


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Products</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `manage_grocery` ON orders.grocery_id=manage_grocery.grocery_id INNER JOIN `shipping` ON orders.shipping_id=shipping.shipping_id WHERE shipping.shipping_date='$dat'");
                $g_total = 0;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // $g_total += $row["total_amt"];
                    ?>
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="admin/controller/<?php echo $row['grocery_img']; ?>"
                                    class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">
                                <?php echo $row['grocery_name'] ?>
                            </p>
                        </td>
                        <td>
                        <p class="mb-0 mt-4">
                            <?php echo $row['ord_quantity'] ?>
                        </p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">
                                <?php echo $row['ord_price'] ?>
                            </p>

                        </td>

                        <td>
                        <p class="mb-0 mt-4">
                            <?php echo $row['shipping_status']; ?>
                        </p>
                        </td>
                        <?php if ($row['shipping_status'] == "delivered") { ?>
                            <td>
                            <p class="mb-0 mt-4">
                                <a href="feedback.php?grocery_id=<?php echo $row['grocery_id'] ?>" class="btn btn-primary">Add
                                    feedback</a>
                            </p>
                            </td>

                                <?php
                        }
                        ?>


                    </tr>
                    <?php
                }
                ?>

                
            </tbody>
        </table>
    </div