<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['a_id'];
$stmt = $admin->ret("SELECT * FROM `admin` WHERE `admin_id` ='$sid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

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


        <div class="d-flex justify-content-center align-items-center">
          <div class="card">
            <div class="card-body" style="width: 600px; height: 700px;">
              <div class="card-title">ADD GROCERY</div>
              <hr>
              <form action="controller/add_grocery.php" method="POST" enctype="multipart/form-data">


                <!-- <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div> -->


                <div class="form-group">
                  <label for="input-6">Name</label>
                  <input type="text" class="form-control form-control-rounded" name="gname" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                  <label for="input-7">Description</label>
                  <input type="text" class="form-control form-control-rounded" name="desc"
                    placeholder="Enter short description">
                </div>
                <div class="form-group">
                  <label for="input-8">Price</label>
                  <input type="text" class="form-control form-control-rounded" name="gprice" placeholder="Enter Price">
                </div>
                <div class="form-group">
                  <label for="input-9">Quantity</label>
                  <input type="text" class="form-control form-control-rounded" name="gquantity"
                    placeholder="Enter Quantity">
                </div>
                <div class="form-group">
                  <label for="input-6">Category</label>


                  <select class=" form-control form-control-rounded" name="category">
                    <option value=" 0" disabled selected>Choose Category</option>

                    <?php
                    $stmt1 = $admin->ret("SELECT * FROM `category`");
                    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <option value="<?php echo $row['category_id']; ?>">
                        <?php echo $row['category_name']; ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>File upload</label><br>
                  <input type="file" name="img" class="file-upload-default">
                  <br>
                  <hr>
                  <div class="form-group">
                    <button type="submit" class="btn btn-light btn-round px-5" name="add_grocery"><i
                        class="icon-lock"></i>Add </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->

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