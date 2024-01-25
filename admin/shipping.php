<!-- <?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['a_id'];
$stmt = $admin->ret("SELECT * FROM `admin` WHERE `admin_id` ='$sid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['a_id'])) {
  $admin->redirect('login');
}
?>

 -->

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

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless">
            <thead>
              <tr>

                <th>Customer Name</th>
                <th>Customer Email</th>
                <th> Customer Address</th>
                <th> Customer Phone</th>
                <th>Shipping Status</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              $stmt = $admin->ret("SELECT * FROM `shipping`");
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                  
                  <td>
                    <p class="mb-0 mt-4">
                      <?php echo $row['shipping_name'] ?>
                    </p>
                  </td>
                  <td>
                    <p class="mb-0 mt-4">
                      <?php echo $row['shipping_email'] ?>
                    </p>
                  </td>
                  <td>
                    <p class="mb-0 mt-4">
                      <?php echo $row['shipping_address'] ?>
                    </p>
                  </td>
                  <td>
                    <p class="mb-0 mt-4">
                      <?php echo $row['shipping_phone'] ?>
                    </p>
                  </td>
    
                  <td>
                    <button class="badge badge-danger">
                      Pending
                    </button>
                  </td>
                  <td>

                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          <!-- <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
            <h5 class="mb-0 ps-4 me-4">Total</h5>
            <p class="mb-0 pe-4" id="gtotal">
              <?php echo $grandTotal; ?>
            </p>

          </div> -->
        </div>
      </div>
    </div>
  </div>






  <!--End Row-->



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