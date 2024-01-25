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

     <li>
       <a href="icons.php">
         <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
       </a>
     </li>

     <li>
       <a href="grocery_form.php">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Add Grocery</span>
       </a>
     </li>
     <li>
       <a href="category_form.php">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Add Category</span>
       </a>
     </li>

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
       <a href="calendar.php">
         <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
         <small class="badge float-right badge-light">New</small>
       </a>
     </li>

     <li>
       <a href="profile.php">
         <i class="zmdi zmdi-face"></i> <span>Profile</span>
       </a>
     </li>

     <li>
       <a href="login.php" target="_blank">
         <i class="zmdi zmdi-lock"></i> <span>Login</span>
       </a>
     </li>

      <li>
       <a href="register.php" target="_blank">
         <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
       </a>
     </li>

     <li class="sidebar-header">LABELS</li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

   </ul>
  
  </div>