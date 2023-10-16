<?php
$id=$_GET['id'];
include("../../../config.php");

if(isset($_POST['btn']))
{
  $batchtid=$_POST['bname'];
  $batchtime=$_POST['btime'];
    $batchdate=$_POST['date'];
   
    $batchfees=$_POST['fees'];
    $batchfaculty=$_POST['faculty'];
    $batchduration=$_POST['duration'];
    
        $sql="update batch set course_id=$batchtid,batch_time='$batchtime',
        Start_date='$batchdate',fees=$batchfees,
        faculty='$batchfaculty',duration='$batchduration' where id=$id";
        if(mysqli_query($con,$sql))
        {
            echo '<script> alert("data update")
            window.location.href="../tables/batch_table.php"
            </script>';
        }
        else
        {
            echo "error".$con->error;
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
                  <h4 class="card-title">Btach Update</h4>
                  <p class="card-description">
                    
                  </p>
                  <?php
                  $id=$_GET['id'];
                   $query="select * from batch where id=$id";
                   $result=mysqli_query($con,$query);
                   $row=mysqli_fetch_row($result);
                  ?>
                  <form class="forms-sample" method="post" >
                  <div class="form-group">
                      <label for="exampleInputName1">Batch name</label>
                      <select class="form-control" name="bname">
                        <option>select batch name</option>
                        <?php
                              
                                $sql="select * from basic_course";
                                $res=mysqli_query($con,$sql);
                                while($rw=mysqli_fetch_row($res))
                                {
                                    ?>
                                    <option value="<?php echo $rw[0];?>"> <?php echo $rw[2];?></option>
                                    <?php
                                }
                                ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Batch Time</label>
                      <select class="form-control" name="btime">
                        <option>select time</option>
                        <option value="08:00am to 09:00am">08:00am to 10:00am</option>
                        <option value="11:00am to 01:00pm">11:00am to 01:00pm</option>
                        <option  value="02:00pm to 04:00pm">02:00pm to 04:00pm</option>
                        <option value="03:00pm to 05:00pm">03:00pm to 05:00pm</option>
                        <option value="06:00pm to 08:00pm">06:00pm to 08:00pm</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Start Date</label>
                      <input type="date" class="form-control" name="date">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Faculty</label>
                      <select class="form-control" name="faculty">
                        <option>select faculty name</option>
                        <?php
                               
                                $sql2="select * from team";
                                $res2=mysqli_query($con,$sql2);
                                while($rw2=mysqli_fetch_row($res2))
                                {
                                    ?>
                                    <option value="<?php echo $rw2[1];?>"> <?php echo $rw2[1];?></option>
                                    <?php
                                }
                                ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Fees</label>
                      <input type="number" class="form-control" name="fees" value="<?php echo $row[4];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Duration</label>
                      <input type="text" class="form-control" name="duration" value="<?php echo $row[6];?>">
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
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote({
              height:600
        });
           
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
</body>

</html>
