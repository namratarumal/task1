<?php
session_start();
include("../../../config.php");
$user=$_SESSION['email'];
$emailquery="select id from registration where email='$user'";
$mailres=mysqli_query($con,$emailquery);
$countrow=mysqli_fetch_row($mailres);
$id=$countrow[0];

$totalfees=0;
$total="select sum(fees) from student_details where sid=$id";
$totalres=mysqli_query($con,$total);
$row=mysqli_fetch_row($totalres);
$totalfees=$row[0];

$paidquery="select sum(fees) from fees_table where sid=$id" ;
  $paidres=mysqli_query($con,$paidquery);
  $paidrow=mysqli_fetch_row($paidres);
  
  $paidfees=$paidrow[0];
  $result =$totalfees - $paidfees  ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gayatri Infotech</title>
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
            <?php
          $sql1="select * from student_details inner join registration on student_details.sid=registration.id inner join fees_table on student_details.sid=fees_table.sid where student_details.sid=$id";
                       $res1=mysqli_query($con,$sql1);
                       $rw1=mysqli_fetch_row($res1);
                       $name=$rw1[7];
                       ?>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">My record</h4>
                  <div >
                  
                  <h5></h5>

                  </div>
                  <h5>Total Fees : <?php echo $totalfees;?>/-</h5>
                  <div class="table-responsive">
                  
                  <table class="table table-striped">
                      
                      <?php    
                      $sql="select * from fees_table where sid=$id";                 
                       //$sql="select * from student_details inner join registration on student_details.sid=registration.id inner join fees_table on student_details.sid=fees_table.sid where student_details.sid=$id";
                       $res=mysqli_query($con,$sql);
                       $totalpaid=0;
                       $total=0;
                       while($rw=mysqli_fetch_row($res))
                       {
                        $total += $totalpaid + $rw[3];
                      ?>
                      
                      <tbody>
                        <tr>
                            <td><?php echo $rw[0];?></td>
                            <td><?php echo $rw[4];?></td>
                            <td><?php echo $rw[3];?></td> 
                        
                        </tr>
                        
                      </tbody>
                      <?php
                       }
                       ?>
                       <tr>
                          <td colspan='2'>Total Paid</td>
                          <td ><?php echo $total;?>/-</td>
                        </tr>
                        <tr>
                          <td colspan='2'>Available Balance</td>
                          <td ><?php echo $result;?>/-</td>
                        </tr>
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
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
