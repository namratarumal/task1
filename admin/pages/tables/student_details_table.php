<?php
include("../../../config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GayatriInfo Admin</title>
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
     include("../../header.php");
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php
     include("../../sidebar.php");
    ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form method="post" action="search.php">
                  
                  <select name="column" style="width: 9%;">
	<option value="name">by name</option>
	<option value="contact">by contact</option>
</select>
<input type="text" class="" name="search" placeholder="name/contact">
                  <input type="submit" name="searchbtn" style="background:#5E50F9;color:white;border-color:#5E50F9;" value="search">
                  </form>
                  <div >
                       <a href="export/student_export.php">
                        <button style="color:white;background:black;width:10%;
                       height:40px;float:right;margin-bottom:30px;">EXPORT</button></a>
                  </div>
                  <div class="table-responsive">
                  <h4 class="card-title">Student Details</h4>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Student Name</th>
                          <th>Course_Name</th>
                          <th>Batch Time</th>
                          <th>Duration</th>
                          <th>Fees</th>
                          <th>Fees details</th>
                          
                        </tr>
                      </thead>
                      <?php 
                       
                          
                         $sql="select * from student_details inner join registration on student_details.sid=registration.id inner join basic_course on student_details.course_name=basic_course.id inner join batch on batch.course_id=student_details.course_name";
                       $res=mysqli_query($con,$sql);
                       while($rw=mysqli_fetch_row($res))
                       {

                      ?>
                      <tbody>
                        <tr>
                            <td><?php echo $rw[0];?></td>
                            <td><?php echo $rw[7];?></td>
                            <td><?php echo $rw[17];?></td>
                            <td><?php echo $rw[26];?></td>
                            <td><?php echo $rw[3];?></td>
                            <td><?php echo $rw[4];?></td>
                            <td><a href="fees_details.php?id=<?php echo $rw[1];?>">view</a></td>
                        </tr>
                      </tbody>
                      <?php
                       }
                      
                       
                       
                       ?>
                    </table>
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
