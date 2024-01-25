<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['a_id'];

$stmt1 = $admin->ret("SELECT * FROM `customer` WHERE `customer_id`='$sid'");
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['a_id'])) {
    $admin->redirect('login');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="assets/css/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <?php
        include 'sidebar.php';
        ?>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <?php
        include 'topbar.php';
        ?>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">


                <!--End Row-->


                <!--End Row-->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"><i>VIEW PAYMENTS</i></h6><br>

                            <br>


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th scope="col"> Customer Name</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Payment Date</th>
                                            <th scope="col">Total Amount</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $g_total = 0;
                                        $stmt = $admin->ret("SELECT * FROM `payment` INNER JOIN `customer` ON payment.customer_id=customer.customer_id ");
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $g_total = $g_total + $row["total_amount"];
                                            ?>
                                            <tr>
                                            
                                                <td>
                                                    <?php echo $row['customer_name']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row['type']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['payment_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['total_amount']?>
                                                </td>
                                                <?php
                                        }
                                        ?>
                                        </tr>

                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div><!--



                      


                  End Row-->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->


        <!--start color switcher-->
        <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>

            </div>
        </div>
        <!--end color switcher-->

    </div><!--End wrapper-->


    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- sidebar-menu js -->
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>

</body>

</html>