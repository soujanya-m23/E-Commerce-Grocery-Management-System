<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['a_id'];
$stmt1 = $admin->ret("SELECT * FROM `customer` WHERE `customer_id`='$sid'");
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

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

    <!-- Spinner End -->


    <!-- Navbar start -->
    <?php
    include 'navbar.php';
    ?>

    <!-- Navbar End -->






    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Freshway Grocery</h1>
            <div class="row g-4">
                <div class="col-lg-12">

                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="shop.php"><i class="fas fa-apple-alt me-2"></i>All</a>
                                                </div>
                                            </li>
                                            <ul>

                                                <?php
                                                $stmt = $admin->ret("SELECT * FROM `category`");
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <ul class="list-unstyled fruite-categorie">
                                                        <li>
                                                            <div class="d-flex justify-content-between fruite-name">
                                                                <a href="shop.php?cat_id=<?php echo $row['category_id'] ?>"><i
                                                                        class="fas fa-apple-alt me-2"></i>
                                                                    <?php echo $row['category_name'] ?>
                                                                </a>
                                                        </li>
                                                    </ul>
                                                    <?php
                                                } ?>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <?php if (!isset($_GET['cat_id'])) {

                            $stmt = $admin->ret("SELECT * FROM `category` INNER JOIN `manage_grocery` ON category.category_id=manage_grocery.category_id ");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>

                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        
                                            
                                            <div class="fruite-img">
                                                <img src="admin/controller/<?php echo $row['grocery_img'] ?>"
                                                    class="img-fluid w-40 rounded-top" alt="">
                                            </div>

                                            <div class="p-4 border border-secondary border-top-2 rounded-bottom">
                                                <h4>
                                                    <?php echo $row['grocery_name'] ?>
                                                </h4>
                                                <p>
                                                    <?php echo $row['description'] ?>
                                                </p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">
                                                        Rs. <?php echo $row['price'] ?>
                                                    </p>
                                                    <a href="controller/add_cart.php?g_id=<?php echo $row['grocery_id']; ?>"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                       
                                    </div>
                                </div>

                                <?php
                            }
                        } else {
                            $cat_id = $_GET['cat_id'];
                            $stmt = $admin->ret("SELECT * FROM `category` INNER JOIN `manage_grocery` ON category.category_id=manage_grocery.category_id WHERE category.category_id='$cat_id'");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>

                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">



                                        <div class="fruite-img">
                                            <img src="admin/controller/<?php echo $row['grocery_img'] ?>"
                                                class="img-fluid w-100 rounded-top" alt="">
                                        </div>

                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>
                                                <?php echo $row['grocery_name'] ?>
                                            </h4>
                                            <p>
                                                <?php echo $row['description'] ?>
                                            </p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">
                                                   Rs. <?php echo $row['price'] ?>
                                                </p>
                                                <a href="controller/add_cart.php?g_id=<?php echo $row['grocery_id']; ?>"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


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