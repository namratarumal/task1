<?php
include("../../../config.php");

if(isset($_POST['btn']))
{
    $sid=$_POST['sname'];
    $bid=$_POST['batchname'];

    $n="select count(id) from addmission where sid=$sid and batchid=$bid";
    $result=mysqli_query($con,$n);
    $count=mysqli_fetch_row($result);
    if($count[0]==1)
    {
        echo '<script> alert("student already join this course ")
        window.location.href="../tables/addmission_table.php"</script>';
    }
        else
        {
          $sql="insert into addmission(sid,batchid) values($sid,$bid)";
          if(mysqli_query($con,$sql))
          {
            $mailquery="select * from addmission inner join registration on addmission.sid=registration.id inner join batch on addmission.batchid=batch.id where registration.id=$sid";
            $mialres=mysqli_query($con,$mailquery);
            $mailrow=mysqli_fetch_row($mialres);
            $studid=$mailrow[1];
            $studname=$mailrow[4];
            $studemail=$mailrow[5];
            $ctime=$mailrow[14];
            $cname=$mailrow[15];

            
              $subject = "Course confirmation";
              $body = "Hi,$studname.Your addmission form filled successfully..
              
              Batch shedule:
              Course Name:$cname
              Course Time:$ctime";
             
              $sender_email = "From: namratarumal2406@gmail.com";
              if(mail($studemail,$subject,$body,$sender_email))
              {
                 
                echo '<script> alert("data insert")
                     window.location.href="../tables/addmission_table.php"
                     </script>';
                 
              }
              else
              {
                  echo '<script> alert("email sendig failed..")</script>';
              }
          }
        }
        $updatequery="update student_details set status='active' where sid=$sid"; 
        if(mysqli_query($con,$updatequery)) 
        {
          echo "update";
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
                  <h4 class="card-title">Addmission Form</h4>
                  <p class="card-description">
               
                  </p>
                  <form class="forms-sample" method="post" >
                    
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Student Name</label>
                      <select class="form-control" name="sname">
                        <option>select student name</option>
                        <?php
                                
                                $sql="select * from student_details inner join registration on student_details.sid=registration.id";
                                $res=mysqli_query($con,$sql);
                                while($rw=mysqli_fetch_row($res))
                                {
                                    ?>
                                    <option value="<?php echo $rw[1];?>"> <?php echo $rw[7];?></option>
                                    <?php
                                }
                                ?>
                      </select>
                    </div>
                 
                    <div class="form-group">
                      <label for="exampleInputName1">Batch Name</label>
                      <select class="form-control" name="batchname">
                        <option>select batch name</option>
                        <?php
                                
                                $sql2="select * from `basic_course` inner join batch on basic_course.id=batch.course_id";
                                $res2=mysqli_query($con,$sql2);
                                while($rw2=mysqli_fetch_row($res2))
                                {
                                    ?>
                                    <option value="<?php echo $rw2[0];?>"> <?php echo $rw2[2];?>(<?php echo $rw2[11];?>)</option>
                                    <?php
                                }
                                ?>
                      </select>
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