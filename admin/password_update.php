<?php
$con=mysqli_connect("localhost","root","","project");
session_start();
if(isset($_POST['btn']))
{
    $user = $_SESSION['email'];
    $newpassword=$_POST['newpassword'];
    $confirmpassword=$_POST['confirmpassword'];

    if($newpassword==$confirmpassword)
   {
        $n1="update registration set password='$newpassword' and 
        confirm_password='$confirmpassword' where email='$user'";
        if(mysqli_query($con,$n1))
        {
            echo '<script> alert("password update succesefully")</script>';
        }
        else
        {
            echo "error".$con->error;
        }
    }
    else
    {
        echo '<script> alert("password not match")</script>';   
    } 
    


    

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gayatri Infotech</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <img src="pages/forms/image/gayatri.png" 
                            style="height:50px;margin-left:10px;float:left;width:20%;">
                            <p style="display: inline-block;float: left;font-weight: bold;color:purple;
                             margin-bottom: 0;margin-left: 5px;margin-top: 10px;font-size:30px;">
                             Gayatri 
                            <span style="display: block;font-size: 15px; font-weight: 500;
                             letter-spacing: 8.5px;text-transform: capitalize; text-align: right;
                             color: black;border-top: 1px solid #ddd;">
                             Infotech</span></p>
              </div><br><br>
              
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="password" name ="newpassword" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="New Password">
                </div>
                <div class="form-group">
                  <input type="password" name="confirmpassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn">Update Password</button>
                </div>
                
                
                <!--<div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="../register.php" class="text-primary">Create</a>
                </div>-->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
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
</body>

</html>
