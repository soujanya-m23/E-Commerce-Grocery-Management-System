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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar start -->
    <?php
    include 'navbar.php';
    ?>
    <!-- Navbar end -->

   
        <div class="container py-5">
            <div class="card" style="width: 80rem;">
                <div class="card-body">
                    <h6 class="card-title text-center" style="font-size: 2em;">My Orders</h6>
                    <?php
                    $stmt = $admin->ret("SELECT * FROM `shipping` WHERE `customer_id`='$sid' GROUP BY `shipping_date` DESC ");
                    while ($row2 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <div style="border-bottom: 1px solid #ccc; margin-bottom: 10px;"></div>


                        <h6 class="card-subtitle mb-2 text-muted">Order date:
                            <?php echo $row2['shipping_date'] ?>
                        </h6>
                        <a href="view_products.php?date=<?php echo $row2['shipping_date'] ?>"
                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i> View order</a>
                        <br>
                        <br>
                        <div style="border-bottom: 1px solid #ccc; margin-bottom: 10px;"></div>




                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
   

</body>

</html>


<!-- 
<div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="card" style="width: 80rem; height:30rem; border-top: 2px solid #ccc;">
                <div class="card-body">
                    <h6 class="card-title text-center" style="font-size: 2em;">My Orders</h6>
                    
                    <p class="card-text"><?php echo $row['customer_name'] ?></p>
                    
                </div>
            </div>

        </div>
    </div> -->