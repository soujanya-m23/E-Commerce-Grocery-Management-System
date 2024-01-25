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


    <!-- Navbar start -->
    <?php
    include 'navbar.php';
    ?>
    <!-- Navbar End -->


    <!-- Modal Search Start -->

    <!-- Modal Search End -->


    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <form action="controller/update_profile.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">


                                            <img src="controller/<?php echo $row['customer_img'] ?>"
                                                class="img-fluid me-8 rounded-circle"
                                                style="width: 100px; height: 100px;" alt="">


                                            <div
                                                class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="col-12 col-sm-auto mb-3">
                                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                                                            <?php echo $row['customer_name'] ?>
                                                        </h4>
                                                        <p class="mb-0">
                                                            <?php echo $row['customer_email'] ?>
                                                        </p>

                                                        <div class="mt-2">
                                                            <span>Change Photo</span>
                                                            <i class="fa fa-fw fa-camera"></i>
                                                            <input type="file" name="img"
                                                                class="form-control file-upload-info">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                <form class="form" novalidate="">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="c_name"
                                                                            value="<?php echo $row['customer_name'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Phone</label>
                                                                        <input class="form-control" type="phone"
                                                                            name="c_phone"
                                                                            value="<?php echo $row['customer_phone'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="email"
                                                                            name="c_email"
                                                                            value="<?php echo $row['customer_email'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" type="hidden"
                                                                name="edit_profile_id" value="<?php echo $id ?>">
                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <div class="form-group">
                                                                        <label>Address</label>
                                                                        <input class="form-control" type="test"
                                                                            name="c_address"
                                                                            value="<?php echo $row['customer_address'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col d-flex justify-content-end">
                                                                <button class="btn btn-primary" type="submit"
                                                                    name="add">Save
                                                                    Changes</button>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    




                                                <!-- loader -->



                                                <script src="js/jquery.min.js"></script>
                                                <script src="js/jquery-migrate-3.0.1.min.js"></script>
                                                <script src="js/popper.min.js"></script>
                                                <script src="js/bootstrap.min.js"></script>
                                                <script src="js/jquery.easing.1.3.js"></script>
                                                <script src="js/jquery.waypoints.min.js"></script>
                                                <script src="js/jquery.stellar.min.js"></script>
                                                <script src="js/owl.carousel.min.js"></script>
                                                <script src="js/jquery.magnific-popup.min.js"></script>
                                                <script src="js/aos.js"></script>
                                                <script src="js/jquery.animateNumber.min.js"></script>
                                                <script src="js/bootstrap-datepicker.js"></script>
                                                <script src="js/scrollax.min.js"></script>
                                                <script
                                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
                                                <script src="js/google-map.js"></script>
                                                <script src="js/main.js"></script>
          












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