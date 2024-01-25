<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['a_id'];
$stmt = $admin->ret("SELECT * FROM `admin` WHERE `admin_id` ='$sid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(!isset($_SESSION['a_id'])){
     $admin->redirect('signin'); }
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
              <h5 class="card-title">GROCERY TABLE</h5><br>
              <a href="grocery_form.php" class="btn btn-dark">Add </a>
              <br>
              <br> 
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Grocery Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Category_Name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $stmt = $admin->ret("SELECT * FROM `manage_grocery` INNER JOIN `category` ON manage_grocery.category_id=category.category_id");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      ?>

                      <tr>
                        <td>
                          <img src="controller/<?php echo $row['grocery_img']; ?>" style="height: 100px">
                        </td>
                        <td>
                          <?php echo $row['grocery_name']; ?>
                        </td>
                        <td>
                          <?php echo $row['description']; ?>
                        </td>
                        <td>
                          <?php echo $row['price']; ?>
                        </td>
                        <td>
                          <?php echo $row['quantity']; ?>
                        </td>
                        <td>
                          <?php echo $row['category_name']; ?>
                        </td>


                        <td><a href="edit_grocery.php?sid=<?php echo $row['grocery_id']; ?>" class="btn btn-dark">Edit</a>
                        </td>
                        <td><a href="controller/delete_grocery.php?did=<?php echo $row['grocery_id']; ?>"
                            class="btn btn-dark">Delete</a></td>
                        <?php
                    }
                    ?>
                    </tr>

                  </tbody>
                </table>
              </div>
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

  <!--Start footer-->
  <?php
  include 'footer.php';
  ?>
  <!--End footer-->

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










