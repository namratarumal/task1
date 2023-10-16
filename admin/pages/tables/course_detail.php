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
      <?php
       include("../../sidebar.php");
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
         
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Course List</h4>
                  <div >
                       <a href="../forms/offilnecourse.php">
                        <button style="color:white;background:black;width:20%;margin-left:10px;
                        height:40px;float:right;margin-bottom:30px;">ADD</button></a>
                  </div>
                  <div >
                       <a href="export/course_export.php">
                        <button style="color:white;background:black;width:20%;
                        height:40px;float:right;margin-bottom:30px;">EXPORT</button></a>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>PDF</th>
                          <th>Duration</th>
                          <th>Fees</th>
                          <th>View</th>
                          <th>Delete</th>
                          <th>Update</th>
                        </tr>
                      </thead>
                      <?php 
                      
                       $sql="select * from basic_course";
                       $res=mysqli_query($con,$sql);
                       while($rw=mysqli_fetch_row($res))
                       {
                      ?>
                      <tbody>
                        <tr>
                            <td><?php echo $rw[0];?></td>
                            <td><?php echo $rw[2];?></td>
                            <td><?php echo $rw[6];?></td>
                            <td><?php echo $rw[7];?></td>
                            <td><?php echo $rw[8];?></td>
                            <td><a href="course_view.php?id=<?php echo $rw[0];?>">View</a></td>
                            <td><a href="course_delete.php?id=<?php echo $rw[0];?>">Delete</a></td>
                            <td><a href="course_update.php?id=<?php echo $rw[0];?>">Update</a></td>
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
