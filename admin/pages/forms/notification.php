<?php
include("../../../config.php");
if(isset($_POST['btn']))
{

    $notice=$_POST['notice'];
    $date=date('Y-m-d',strtotime($_POST['date']));

    $sql="insert into notice(notice,date)values('$notice','$date')";
         if(mysqli_query($con,$sql))
         {
           echo '<script> alert("notice send") 
           window.location.href="../tables/notification_table.php"
           </script>';
         }
         else
        {
             echo "error".$con->error;
        }
    //$sender_array=array();
  //   for($i=0; $i<$tosender; $i++)
  //  {
    
  //       $tosend=array($_POST['cname'][$i]);
  //       $mul_sender=implode(",",$tosend);
       
    
  //        array_push($sender_array,$mul_sender);
   
  // }
  // $sender_json=json_encode($sender_array);
    
  //       $sql="insert into notice(notice,tosender,date)values('$notice','$sender_json','$date')";
  //       if(mysqli_query($con,$sql))
  //       {
  //          echo '<script> alert("notice sended") </script>';
  //       }
  //       else
  //       {
  //           echo "error".$con->error;
  //       }
    
    
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
                  <h4 class="card-title">Notice</h4>
                  <p class="card-description">
                
                  </p>
                  <form class="forms-sample" method="post">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail3">Notice</label>
                      <textarea class="form-control" name="notice"></textarea>
                    </div>
                    
                   <div class="form-group">
                      <label for="exampleInputEmail3">Date</label>
                      <input type="date" class="form-control" name="date" placeholder="Enter date">
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
