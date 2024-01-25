<?php

$sid = $_SESSION['a_id'];
$stmt = $admin->ret("SELECT * FROM `customer` WHERE `customer_id` ='$sid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
       
            <div class="d-flex justify-content-between">
                <?php
                if (isset($_SESSION["a_id"])) { ?>
                    <div class="top-info ps-2">
                        <small class="my-auto"><i class="fas fa-user fa-x"></i> <a href="#" class="text-white">
                                <?php echo $row['customer_name'] ?> &nbsp; &nbsp;
                            </a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                                class="text-white">
                                <?php echo $row['customer_email'] ?>
                            </a></small>
                    </div>
                <?php } ?>

            </div>
    </div>
        
        <div class="container px-2">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text-primary display-6">Freshway</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="shop.php" class="nav-item nav-link">Shop</a>
                        <!-- <a href="shop-detail.php" class="nav-item nav-link">Shop Detail</a> -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="cart.php" class="dropdown-item">Cart</a>

                                <a href="chackout.php" class="dropdown-item">Chackout</a>

                                <a href="feedback.php" class="dropdown-item">Feedback</a>
                                <!-- <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            <a href="404.php" class="dropdown-item">404 Page</a> -->
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link active">Contact</a>
                    </div>





                    <!-- <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a> -->
                    <?php
                    if (isset($_SESSION['a_id'])) {
                        ?>
                        <a href="myorders.php" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;"></span>
                        </a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-sm-2" src="img/avatar.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex">
                                    <?php echo $row['customer_name'] ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                <a href="profile_display.php" class="dropdown-item">My Profile</a>

                                <a href="controller/logout.php" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    <?php } else {
                        ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-sm-2" src="img/avatar.jpg" alt=""
                                    style="width: 40px; height: 40px;">

                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                <a href="login.php" class="dropdown-item">Login</a>

                                <a href="register.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                </div>
            </nav>
        </div>
    </div>
</div>