<?php
$id=$_GET['id'];
include("../../../config.php");
if(isset($_POST['btn']))
{
    $name=$_POST['name'];
    $filename=$_FILES['image']['name'];
    $filesize=$_FILES['image']['size'];
    $filetempname=$_FILES['image']['tmp_name'];
    $filetype=$_FILES['image']['type'];
    $filestore="../forms/image/".$filename;
    $position=$_POST['position'];
    if(move_uploaded_file($filetempname,$filestore))
    {
        $sql="update team set name='$name',image='$filename',position='$position' where id=$id";
        if(mysqli_query($con,$sql))
        {
            echo '<script> alert("data update")
            window.location.href="../tables/teachres_table.php"
            </script>';
        }
        else
        {
            echo "error";
        }
    }
    else
    {
        echo "image not found";
    }
}
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
                  <h4 class="card-title">Staff Update</h4>
                  <p class="card-description">
                    
                  </p>
                  <?php
                  $id=$_GET['id'];
                 
                  $sql1="select * from team where id=$id";
                  $res=mysqli_query($con,$sql1);
                  $rw=mysqli_fetch_row($res);
                  ?>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail3">Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $rw[1];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Image</label>
                      <input type="file" class="form-control" id="exampleInputName1" name="image">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Position</label>
                      <input type="text" class="form-control" name="position" value="<?php echo $rw[3];?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                    
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
  
    <!-- //Summernote JS - CDN Link -->
</body>

</html>
