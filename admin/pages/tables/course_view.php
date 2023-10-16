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
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />

  <!-- Summernote CSS - CDN Link -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

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
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Course View</h4>
                  <p class="card-description">
                   
                  </p>
                  <?php
                  $id=$_GET['id'];
                 
                  $sql1="select * from basic_course where id=$id";
                  $rs=mysqli_query($con,$sql1);
                  $rw=mysqli_fetch_row($rs);
                  ?>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                       <select name="cname" class="form-control">
                        <option>Selece language name</option>
                        <?php
                         $tbl="select * from courses";
                         $rs=mysqli_query($con,$tbl);
                         while($row=mysqli_fetch_row($rs))
                         {
                          ?>
                           <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                          <?php
                         }
                        ?>
                       </select>  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $rw[2];?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="" rows="4" name="desc" ><?php echo $rw[4];?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Overview</label>
                      <textarea class="form-control" id="summernote" rows="4" name="overview"><?php echo $rw[5];?></textarea>
                    </div>
                    <!--<div class="form-group">
                      <label for="exampleInputName1">PDF upload</label>
                      <input type="file" class="form-control" id="exampleInputName1" name="pdf" value="<?php echo $rw[6];?>">
                    </div>-->
                    <div class="form-group">
                      <label for="exampleInputEmail3">Duration</label>
                      <input type="text" class="form-control" name="duration" value="<?php echo $rw[7];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Fees</label>
                      <input type="text" class="form-control" name="fees" value="<?php echo $rw[8];?>">
                    </div>
                    
                    
                  </form>
                </div>
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
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Summernote JS - CDN Link -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote({
              
        });
           
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
              
        });
           
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#summernote1").summernote({
              
        });
           
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
</body>

</html>
