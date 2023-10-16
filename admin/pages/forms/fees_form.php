<?php
include("../../../config.php");
$totalpaid=0;
$totalfees=0;
$result=0;
if(isset($_POST['btn']))
{
  $sid=$_POST['sname'];
  $fessmethod=$_POST['fees'];
  $amount=$_POST['amount'];
  $date=date('Y-m-d',strtotime($_POST['date']));

  $paidquery="select sum(fees) from fees_table where sid=$sid" ;
  $paidres=mysqli_query($con,$paidquery);
  $paidrow=mysqli_fetch_row($paidres);
  
  $paidfees=$paidrow[0]+$amount;
 

  $feesquery="select sum(fees) from student_details where sid=$sid" ;
  $feesres=mysqli_query($con,$feesquery);
  $feesrow=mysqli_fetch_row($feesres);
  $totalfees=$feesrow[0];

  if($paidfees>$totalfees)
  {
    //$result = $paidfees - $totalfees;
    
    echo '<script> alert("Please check your balance ")
    window.location.href="../tables/fees_table.php"
    </script>';
    

  }
  else
  {
          $sql="insert into fees_table(sid,payment_method,fees,date) values($sid,'$fessmethod',$amount,'$date')";
          if(mysqli_query($con,$sql))
          {
            echo "<script>alert('Fess Added Successfully')
            window.location.href='../tables/fees_table.php';
            </script>";
        }
      else
      {
              echo "error".$con->error;
          }
      
      
      
      
      
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
</style>
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
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fees Entery  </h4>
                  <p class="card-description">
                
                  </p>
                  <form method="post" >
                        <div class="row">   
                        
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control" name="sname">
                                        <option>select student name</option>
                                        <?php
                                               
                                                $sql2="select * from registration";
                                                $res2=mysqli_query($con,$sql2);
                                                while($rw=mysqli_fetch_row($res2))
                                                {
                                                 
                                                    ?>
                                                    <option value="<?php echo $rw[0];?>"><?php echo $rw[1];?></option>
                                                    
                                                    <?php
                                                }
                                                ?>
                                                
                                        </select>
                                    </div>
                                    
                                </div>
                                
                       
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="amount" id="subject"  placeholder="Enter Amount" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date" id="subject"  placeholder="Enter Amount" required>
                                    </div>
                                </div>    
                                <h4 class="card-title">Fees method:</h4>
                                <div class="col-12" style="float:right;" >
                                <label class="container"style="font-size:20px;margin-top:-10px;margin-left:10px;">Cash payment</label>
                                    <input type="radio" checked="checked" name="fees" style="float:left;margin-top:-30px;"value="Cash payment">                          
                                    <label class="container"style="font-size:20px;margin-top:-10px;margin-left:10px;">Online payment</label>
                                    <input type="radio" checked="checked" name="fees" style="float:left;margin-top:-30px;" value="Online payment">
                                   
                                    <label class="container"style="font-size:20px;margin-top:-10px;margin-left:10px;">Check payment</label>
                                    <input type="radio" checked="checked" name="fees" style="float:left;margin-top:-30px;" value="Check payment">                                       
                                </div> 
                                  
                                <div style="width:70%; margin-left:20px;">
                                    <div class="form-group" >
                                    <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                                    </div>
                                </div>
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
              height:600
        });
           
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
</body>

</html>