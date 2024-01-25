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
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5" id="table">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th></th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <!-- <th scope="col">Delete</th> -->

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $stmt = $admin->ret("SELECT * FROM `add_to_cart` INNER JOIN `manage_grocery` ON manage_grocery.grocery_id=add_to_cart.grocery_id");

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

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
                                <td>
                                    <input type="hidden" name="cart_id" value="<?php echo $row['cart_id'] ?>">
                                </td>

                                <td class="quantity">

                                    <div class="input-group mb-3">
                                        <button id="minus"
                                            onclick="sub(<?php echo $row['cart_id']; ?>,<?php echo $row['c_quantity']; ?>,<?php echo $row['c_price']; ?>)"
                                            class="btn btn-sm btn-minus rounded-circle bg-light border mb-0 mt-4">
                                            <i class="fa fa-minus"></i>

                                        </button>

                                        <input class="form-control-sm text-center border-0 mb-0 mt-4" type="text"
                                            id="g_quantity" class="iquantity" name="quantity"
                                            value="<?php echo $row['c_quantity']; ?>">




                                        <button id="add"
                                            class="btn btn-sm btn-plus rounded-circle bg-light border mb-0 mt-4"
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
            <?php
            $g_total = 0;
            $stmt1 = $admin->ret("SELECT * FROM `add_to_cart`");
            
            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                $g_total = $g_total + $row1["total_amt"];
            }
                ?>
                <tr>
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
                </tr>
           


        </div>
    </div>

    <script>
        function add(cart_id, quantity, price) {
            // Use AJAX to send data to PHP script
            // let quantity = parseInt(document.getElementById('g_quantity').value);
            quantity++

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("table").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", `controller/add_cart.php?id=${cart_id}&quantity=${quantity}&price=${price}`, true);
            xhttp.send();

        }
        function sub(cart_id, quantity, price) {
            // Use AJAX to send data to PHP script
            // let quantity = parseInt(document.getElementById('g_quantity').value);
            quantity--

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("table").innerHTML = this.responseText;


                }
            };
            xhttp.open("GET", `controller/add_cart.php?id=${cart_id}&quantity=${quantity}&price=${price}`, true);
            xhttp.send();

        }
    </script>

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