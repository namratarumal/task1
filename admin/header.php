<?php
session_start();
include("../config.php");

// if(!isset($_SESSION['useradmin']))
// {
    
//     echo '<script> alert("Please login")
//             window.location.href="../../index.php"
//             </script>';
// }

?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <img src="../forms/image/gayatri.png" 
                            style="height:50px;margin-left:10px;float:left;">
                            <p style="display: inline-block;float: left;font-weight: bold;color:purple;
                             margin-bottom: 0;margin-left: 5px;margin-top: 10px;font-size:30px;">
                             Gayatri 
                            <span style="display: block;font-size: 15px; font-weight: 500;
                             letter-spacing: 8.5px;text-transform: capitalize; text-align: right;
                             color: black;border-top: 1px solid #ddd;">
                             Infotech</span></p>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
             
             
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">

            <li class="nav-item nav-profile dropdown">
            <?php
                      
                    //   $adminname="";
                    //   $adminname1="";
            //   if(isset($_SESSION['admin']))
            //   {
            //     $user=$_SESSION['admin'];
            //     //echo "Admin=".$user;
            //       $nm="select * from admin_register where email='$user'";
            //       $result=mysqli_query($con,$nm);
            //       $count=mysqli_fetch_row($result);
            //       $adminname= $count[1];
              ?>
               <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php //echo $adminname; ?>
              </a>      
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="profileedit.php">
                <i class="ti-settings text-primary"></i>
                Edit Profile
              </a>
              <a class="dropdown-item" href="../../logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              </div>
              <?php
            //   }else if(isset($_SESSION['email']))
            //   {
            //       $usermail=$_SESSION['email'];
            //       $nm1="select * from registration where email='$usermail'";
            //       $result1=mysqli_query($con,$nm1);
            //       $count1=mysqli_fetch_row($result1);
            //       $adminname1= $count1[1];
            //   }
              ?>
              
              
          </li>                       
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>