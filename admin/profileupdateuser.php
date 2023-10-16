<?php
include("../config.php");
session_start();
if(isset($_POST['btn']))
{
    $user=$_SESSION['email'];
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $qualification=$_POST['qualification'];
    $filename=$_FILES['profile']['name'];
    $filesize=$_FILES['profile']['size'];
    $filetmpname=$_FILES['profile']['tmp_name'];
    $filetype=$_FILES['profile']['type'];
    $filestore="../image/".$filename;

    
    if($filename!="")
{
    if(move_uploaded_file($filetmpname,$filestore))
     {
        $query="update registration set name='$name',email='$email',password='$pass',confirm_password='$cpass',address='$address',contact=$contact,qualification='$qualification',profile='$filename' where email='$user'";
        
        $rs=mysqli_query($con,$query);
        if($rs)
        {
          echo '<script> alert("Profile Uodated Successfully") 
          window.location.href="index1.php"
          </script>';
        }
        else
        {
            echo "error".$con->error;
        }
     }
}
else
{
    $query="update registration set name='$name',email='$email',password='$pass',confirm_password='$cpass',address='$address',contact=$contact,qualification='$qualification' where email='$user'";
        
        $rs=mysqli_query($con,$query);
        if($rs)
        {
          echo '<script> alert("Profile Uodated Successfully") 
          window.location.href="index1.php"
          </script>';
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
          <div class="col-lg-5 mx-auto">
       
           
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                <?php
                
                 include("../config.php");
                   $user=$_SESSION['email'];
                   $nm="select profile from registration where email='$user'";
                   $result1=mysqli_query($con,$nm);
                   $rw=mysqli_fetch_row($result1);
                   $profile= $rw[0];
                   ?>
                   
                   <div class="brand-logo">
                       <img src="../image/<?php echo $profile;?>" style="margin-left:150px;border-radius:80px;">
                    </div>
                </div>
                <?php
                   
                   $nm1="select * from registration where email='$user'";
                   $result1=mysqli_query($con,$nm1);
                   $rw1=mysqli_fetch_row($result1);
                  
                ?>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="file" name ="profile" class="form-control form-control-lg" id="exampleInputEmail1" value="<?php echo $rw1[8];?>">
                </div>
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg" id="exampleInputEmail1" value="<?php echo $rw1[1];?>">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg"  value="<?php echo $rw1[2];?>">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" value="<?php echo $rw1[3];?>">
                </div>
                <div class="form-group">
                  <input type="password" name="cpassword" class="form-control form-control-lg" value="<?php echo $rw1[4];?>">
                </div>
                <div class="form-group">
                  <input type="text" name="address" class="form-control form-control-lg" value="<?php echo $rw1[5];?>">
                </div>
                <div class="form-group">
                  <input type="number" name="contact" class="form-control form-control-lg"  value="<?php echo $rw1[6];?>">
                </div>
                <div class="form-group">
                  <input type="text" name="qualification" class="form-control form-control-lg" value="<?php echo $rw1[7];?>">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn">Profile Edit</button>
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
