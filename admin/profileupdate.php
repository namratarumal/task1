<?php
include('../../config.php');
session_start();
if(isset($_POST['btn']))
{
    $user=$_SESSION['user'];
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $course=$_POST['course'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $filename=$_FILES['profile']['name'];
    $filesize=$_FILES['profile']['size'];
    $filetmpname=$_FILES['profile']['tmp_name'];
    $filetype=$_FILES['profile']['type'];
    $filestore="img/".$filename;

    
    if($filename!="")
{
    if(move_uploaded_file($filetmpname,$filestore))
     {
        $query="update registration set name='$name',email='$email',password='$pass',
        course='$course' ,address='$address',contact=$contact,profile='$filename' where email='$user'";
        $rs=mysqli_query($con,$query);
        if(mysqli_fetch_row($rs))
        {
          echo '<script> alert("data update") 
          window.location.href="index.php"
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
    $query="update registration set name='$name',email='$email',password='$pass',
        course='$course' ,address='$address',contact=$contact where email='$user'";
        $rs=mysqli_query($con,$query);
        if(mysqli_fetch_row($rs))
        {
          echo '<script> alert("data update") 
          window.location.href="index.php"
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
          <?php
           if(isset($_SESSION['email']) && $_SESSION['email']==true)
            {
             $user=true;
            }    
            else
            {
              $user=false;
            }
            ?>
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                <?php
                if($user)
                {
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
                   
                   $nm="select * from registration where email='$user'";
                   $result1=mysqli_query($con,$nm);
                   $rw=mysqli_fetch_row($result1);
                  
                ?>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="file" name ="profile" class="form-control form-control-lg" id="exampleInputEmail1" value="<?php echo $rw[8];?>">
                </div>
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg" id="exampleInputEmail1" value="<?php echo $rw[1];?>">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg"  value="<?php echo $rw[2];?>">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" value="<?php echo $rw[3];?>">
                </div>
                <div class="form-group">
                  <input type="text" name ="course" class="form-control form-control-lg" value="<?php echo $rw[5];?>">
                </div>
                <div class="form-group">
                  <input type="text" name ="address" class="form-control form-control-lg" value="<?php echo $rw[6];?>">
                </div>
                <div class="form-group">
                  <input type="number" name ="contact" class="form-control form-control-lg"  value="<?php echo $rw[7];?>">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn">Profile Edit</button>
                </div>
                
                </form>
            </div>
           <?php
                }
                else
                {
                  
                    
                   ?>
                   
                   <div class="brand-logo">
                       <img src="user1.png" style="margin-left:150px;border-radius:80px;">
                    </div>
                </div>
                
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="file" name ="profile" class="form-control form-control-lg" id="exampleInputEmail1" >
                </div>
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg" id="exampleInputEmail1" >
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg">
                </div>
                <div class="form-group">
                  <input type="text" name ="course" class="form-control form-control-lg" >
                </div>
                <div class="form-group">
                  <input type="text" name ="address" class="form-control form-control-lg" >
                </div>
                <div class="form-group">
                  <input type="number" name ="contact" class="form-control form-control-lg">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn">Profile Edit</button>
                </div>
                
                </form>
            </div>
                  <?php
                }
                ?>
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
