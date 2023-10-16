<?php
session_start();
include("../../../config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
   <?php
    include("../../headeruser.php")
   ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php
      include("../../sidebaruser.php");
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">My record</h4>
                  <div >
                       <a href="student_fees.php">
                        <button style="color:white;background:black;width:15%;
                       height:40px;float:right;margin-bottom:30px;">Fees Details</button></a>
                  </div>
                  <div class="table-responsive">
                  <?php
                    // if(isset($_SESSION['email']) && $_SESSION['email']==true)
                    //   {
                    //   $user=true;
                    //   }    
                    //   else
                    //   {
                    //     $user=false;
                    //   }
                    //   if(!$user)
                    //   {

                    //   }
                    //   else
                    //   {
                      ?>
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Course_Name</th>
                         
                          <th>Duration</th>
                         
                          <th>Total Fees</th>
                         
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php 
                      
                      $user=$_SESSION['email'];
                       //echo $user;
                      // $nm="select * from registration where email='$user'";
                       //$result1=mysqli_query($con,$nm);
                        // $count1=mysqli_fetch_row($result1);
                        // $sid= $count1[0];
    

                       $n="select * from student_details inner join registration on student_details.sid=registration.id inner join basic_course on basic_course.id=student_details.course_name where registration.email='$user'";
                       $res=mysqli_query($con,$n);
                       while($rw=mysqli_fetch_row($res))
                       {
                      ?>
                        <tr>
                            <td><?php echo $rw[6];?></td>
                            <td><?php echo $rw[17];?></td>
                            <td><?php echo $rw[3];?></td>
                            
                            <td><?php echo $rw[4];?></td>
                            
                       </tr>
                       
                      
                      <?php
                       }
                       ?>
                      
                      </tbody>
                      
                       
                    </table>
                    <?php
                     // }
                      ?>
                  </div>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php
      include("../../footer.php");
      ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
