<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['a_id'];
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

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <?php
    include 'navbar.php';
    ?>
    <!-- Navbar End -->


    <!-- Modal Search Start -->

    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            <form action="controller/add_checkout.php" method="POST">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">First Name<sup>*</sup></label>
                                    <input type="text" class="form-control" name="name"
                                        value="<?php echo $row['customer_name'] ?>" required>
                                </div>
                            </div>

                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="tel" class="form-control" name="phone" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-item">
                            <label class="form-label my-3">Address <sup>*</sup></label>
                            <input type="text" class="form-control" placeholder="House Number Street Name"
                                name="address">
                        </div>

                        <div class="form-item">
                            <label class="form-label my-3">Pincode<sup>*</sup></label>
                            <input type="text" class="form-control" name="pincode">
                        </div>


                        <hr>


                    </div>
                    
                    <div class="col-md-12 col-lg-6 col-xl-5">
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
                                        $g_total += $row["total_amt"];
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center">
                                                    <img src="admin/controller/<?php echo $row['grocery_img']; ?>"
                                                        class="img-fluid me-5 rounded-circle"
                                                        style="width: 80px; height: 80px;" alt="">
                                                </div>
                                            </th>
                                            <td>
                                                <p class="mb-0 mt-4">
                                                    <?php echo $row['grocery_name'] ?>
                                                </p>
                                            </td>
                                            <td>
                                                <p class="mb-0 mt-4">
                                                    <?php echo $row['c_price'] ?>
                                                </p>

                                            </td>


                                            <td>

                                             
                                                <p class="mb-0 mt-4">
                                                    <?php echo $row['c_quantity'] ?>
                                                </p>
                                          


                                            </td>
                                            <td class="itotal">
                                                <p class=" mb-0 mt-4">
                                                    <?php echo $row['total_amt'] ?>
                                                </p>


                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">
                                                    <?php echo $g_total; ?>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Method</h3>
                                <hr>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pay_type" class="mr-2" value="Cash"> Cash
                                                on Delivery
                                            </label>
                                        </div>
                                        <br>
                                        
                                        <br>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pay_type" class="mr-2" value="UPI"> UPI
                                            </label>
                                            <input type="text" name="trans_id" placeholder="Enter transaction ID"
                                                class="form-control">
                                        </div>
                                        <br>
                                        
                                    </div>
                                </div>


                                <br>
                                <br>
                                <p><button name="place" class="btn btn-primary py-3 px-4">Place an
                                        order</button></p>
                                        <br>
                                        

                            </div>
                        </div>
            </form>
            <!-- Checkout Page End -->


            <!-- Footer Start -->

            <!-- Footer End -->

            <!-- Copyright Start -->

            <!-- Copyright End -->



            <!-- Back to Top -->
            <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
                    class="fa fa-arrow-up"></i></a>


            <!-- JavaScript Libraries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/lightbox/js/lightbox.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
</body>

</html>