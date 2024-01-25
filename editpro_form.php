<?php
include 'config.php';
$admin = new Admin();
$id1 = $_GET['sid'];
$stmt = $admin->ret("SELECT * FROM `customer` WHERE `customer_id` ='$id1'");
$crow = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->

        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form action="controller/update_profile.php" method="POST" enctype="multipart/form-data">
                        <div class="bg-light rounded p-sm-5 my-4 mx-3">
                            <div class="text-center">
                                <a href="index.php" class="text-center">
                                    <!-- <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i</h3> -->
                                </a>
                                <h3>Edit Profile</h3><br>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Enter phone number" name="c_name"
                                    value="<?php echo $crow['customer_name'] ?>">
                                <label for="floatingInput">Full Name</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Enter phone number" name="c_phone"
                                    value="<?php echo $crow['customer_phone'] ?>">
                                <label for="floatingInput">Phone Number</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" placeholder="name@example.com" name="c_email"
                                    value="<?php echo $crow['customer_email'] ?>">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Enter Address" name="c_address"
                                    value="<?php echo $crow['customer_address'] ?>">
                                <label for="floatingInput">Address</label>
                            </div>
                            <div class="form-group">
                                <label>File upload</label><br>
                                <input type="file" name="img" class="file-upload-default" value="value=" <?php echo $crow['customer_img'] ?>"">
                                <br>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark btn-round px-5" name="add"><i
                                            class="icon-lock"></i>Add </button>
                                </div>
                            </div>




                            <input type="hidden" name="std_id" value="<?php echo $id1 ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>