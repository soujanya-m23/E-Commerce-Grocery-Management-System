<?php
include 'config.php';
$admin = new Admin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Freshway-A Grocery Shopping Website</title>
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
    <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
    <!-- Spinner End -->


    <!-- Navbar start -->

    <?php
    include 'navbar.php';
    ?>
    <!-- Navbar End -->


    <!-- Modal Search Start -->

    <!-- Hero Start -->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
        
            <div class="row g-4">
                <div class="col-lg-12">

                    <div class="row g-4">
                        <div class="container-fluid py-5 mb-5 hero-header">
                            <div class="container py-5">
                                <div class="row g-5 align-items-center">
                                    <div class="col-md-12 col-lg-7">
                                        <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                                        <h1 class="mb-5 display-3 text-primary">Grocery shopping has never been this
                                            fun!</h1>

                                    </div>
                                    <div class="col-md-12 col-lg-5">
                                        <div id="carouselId" class="carousel slide position-relative"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active rounded">
                                                    <img src="img/hero-img-1.png"
                                                        class="img-fluid w-100 h-100 bg-secondary rounded"
                                                        alt="First slide">
                                                    <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                                                </div>
                                                <div class="carousel-item rounded">
                                                    <img src="img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded"
                                                        alt="Second slide">
                                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselId" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselId" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
            <!-- Hero End -->


            <!-- Featurs Section Start -->

            <!-- Featurs Section End -->




            <!-- Fruits Shop End-->
            <h1 class="mb-4">Our Products</h1>
            <?php $stmt = $admin->ret("SELECT * FROM `category` INNER JOIN `manage_grocery` ON category.category_id=manage_grocery.category_id WHERE category.category_id=3");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>

                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="rounded position-relative fruite-item">


                        <div class="fruite-img">
                            <img src="admin/controller/<?php echo $row['grocery_img'] ?>" class="img-fluid w-40 rounded-top"
                                alt="">
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
                                    Rs.
                                    <?php echo $row['price'] ?>
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

            ?>
               </div>
        </div>
    </div>




            <!-- Featurs Start -->

            <!-- Featurs End -->


            <!-- Vesitable Shop Start-->

            <!-- Vesitable Shop End -->


            <!-- Banner Section Start-->

            <!-- Banner Section End -->


            <!-- Bestsaler Product Start -->


            <!-- Bestsaler Product End -->


            <!-- Fact Start -->

            <!-- Fact Start -->


            <!-- Tastimonial Start -->

            <!-- Tastimonial End -->


            <!-- Footer Start -->
            <?php
            include 'footer.php';
            ?>
            <!-- Footer End -->

            <!-- Copyright Start -->
            <div class="container-fluid copyright bg-dark py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your
                                    Site Name</a>, All right
                                reserved.</span>
                        </div>
                        <div class="col-md-6 my-auto text-center text-md-end text-white">
                            <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                            <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                            <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
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