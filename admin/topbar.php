<?php 
$sid=$_SESSION['a_id'];
$stmt=$admin->ret("SELECT * FROM `admin` WHERE `admin_id` ='$sid'");
$row =$stmt ->fetch(PDO::FETCH_ASSOC);
?>

<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
   
    
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $row['admin_name']?></h6>
            <p class="user-subtitle"><?php echo $row['admin_email']?></p>
            </div>
           </div>
          </a>
        </li>
        <a href ="profile.php.php"><li class="dropdown-item"><i class="icon-power mr-2"></i> Profile</li></a>
      
        <a href ="controller/logout.php"><li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>