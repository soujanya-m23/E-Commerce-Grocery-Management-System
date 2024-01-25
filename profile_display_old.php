<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['a_id'];
$stmt = $admin->ret("SELECT * FROM `customer` WHERE `customer_id` ='$sid'");
$drow = $stmt->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['a_id'])) {
    $admin->redirect('login');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medplus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="goto-here">
    <!-- START nav -->
    <?php include 'navbar.php' ?>
    <!-- END nav -->

    <div class="container">
        <div class="row flex-lg-nowrap">
            <!-- <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="#"><i
                                        class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i
                                        class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page"
                                    target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>
                        </ul>
                    </div>
                </div>
            </div> -->

            <div class="col">
                <form action="controller/user_edit_profile.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">
                                            <div
                                                class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="col-12 col-sm-auto mb-3">
                                                    <img src="admin/controller/<?php echo $rowp['customer_img'] ?>"
                                                        class="img-fluid me-5 rounded-circle"
                                                        style="width: 80px; height: 80px;" alt="">
                                                </div>
                                            </div>
                                            <div
                                                class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                                                        <?php echo $rowp['customer_name'] ?>
                                                    </h4>
                                                    <p class="mb-0">
                                                        <?php echo $rowp['customer_email'] ?>
                                                    </p>

                                                    <div class="mt-2">
                                                        <span>Change Photo</span>
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <input type="file" name="img1"
                                                            class="form-control file-upload-info">

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
                                                                            name="name"
                                                                            value="<?php echo $rowp['customer_name'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input class="form-control" type="phone"
                                                                            name="phone"
                                                                            value="<?php echo $rowp['customer_phone'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="email"
                                                                            name="email"
                                                                            value="<?php echo $rowp['customer_email'] ?>">
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
                                                                            name="address"
                                                                            value="<?php echo $rowp['customer_address'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!-- loader -->
                                                    <div id="ftco-loader" class="show fullscreen"><svg class="circular"
                                                            width="48px" height="48px">
                                                            <circle class="path-bg" cx="24" cy="24" r="22" fill="none"
                                                                stroke-width="4" stroke="#eeeeee" />
                                                            <circle class="path" cx="24" cy="24" r="22" fill="none"
                                                                stroke-width="4" stroke-miterlimit="10"
                                                                stroke="#F96D00" />
                                                        </svg></div>


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


</body>

</html>