<?php
 include("../config.php");

if(isset($_POST['btn']))
{
    $usename=$_POST['uname'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];

    $sql="select count(id) from admin_register where email='$email'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_fetch_row($res);
    if($count[0]=='1')
    {
        echo '<script> alert("user already registerd")</script>';
    }
    else
    {
        if($pass==$cpass)
        {
        $insertquery="insert into admin_register(username,email,password,confirm_password)values('$usename','$email','$pass','$cpass')";
        $query=mysqli_query($con,$insertquery);
    
        if($query)
        {

          echo '<script> alert("data insert")</script>';
        }
        else
        {
         echo 'error'.$con->error;
        }
       }
       else
       {
        echo '<script> alert("password no match")</script>';
       }
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
              
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="uname" placeholder="Username" pattern="[a-z0-9]{1,15}">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$">
                </div>              
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z]).{8,}">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="cpass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z]).{8,}">
                </div>
                
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
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
