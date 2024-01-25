<?php 
$sid=$_SESSION['a_id'];
$stmt=$admin->ret("SELECT * FROM `admin` WHERE `admin_id` ='$sid'");
$row =$stmt ->fetch(PDO::FETCH_ASSOC);
?>




<div id="wrapper">
 
 <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="index.php">
      <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
      <h5 class="logo-text"><?php echo $row['admin_name']?></h5>
    </a>
  </div>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li>
       <a href="index.php">
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>

     <!-- <li>
       <a href="grocery_form.php">
         <i class="zmdi zmdi-format-list-bulleted "></i> <span>Add Grocery</span>
       </a>
     </li> -->
     <!-- <li>
       <a href="category_form.php">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Add Category</span>
       </a>
     </li> -->

     <li>
       <a href="tables.php">
         <i class="zmdi zmdi-grid"></i> <span>Display Grocery</span>
       </a>
     </li>
     <li>
       <a href="category_table.php">
         <i class="zmdi zmdi-grid"></i> <span>Display Category</span>
       </a>
     </li>
     <li>
       <a href="order_form.php">
         <i class="zmdi zmdi-grid"></i> <span>Display Orders</span>
       </a>
     </li>
     <li>
       <a href="shipping.php">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Manage Shipping</span>
       </a>
     </li>
     <li>
       <a href="payment.php">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Manage Payments</span>
       </a>
     </li>
     <li>
       <a href="feedback.php">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Manage Feedbacks</span>
       </a>
     </li>




     <!-- <li>
       <a href="calendar.php">
         <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
         <small class="badge float-right badge-light">New</small>
       </a>
     </li> -->

   
   </ul>
  
  </div>