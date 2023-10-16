<?php
require("config.php");
session_Start();
if(isset($_POST['btn']))
{
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $password=$_POST['pass'];
    $cpassword=$_POST['cpass'];
    $qualification=$_POST['qualification'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $filename=$_FILES['profile']['name'];
    $filesize=$_FILES['profile']['size'];
    $filetmpname=$_FILES['profile']['tmp_name'];
    $filetype=$_FILES['profile']['type'];
    $filestore="image/".$filename;

    if(move_uploaded_file($filetmpname,$filestore))
    {
    $query="select * from registration where email='$mail' and confirm_password='$cpassword'
    ";
    $rs=mysqli_query($con,$query);
    $count=(mysqli_fetch_row($rs));
    if($count)
    {
       //$_SESSION['email']=$email;
        echo '<script>alert("user alredy registerd")</script>';
        // header('Location:student_details.php');
    }
    else
    {
        echo "user not found";
        if($password==$cpassword)
        {
           // $npass = password_hash($password, PASSWORD_DEFAULT);
            //$cmpass = password_hash($cpassword, PASSWORD_DEFAULT);
            $sql="insert into registration(name,email,password,confirm_password,address,qualification,contact,profile)values
            ('$name','$mail','$password','$cpassword','$address','$qualification',$contact,'$filename')";
            if(mysqli_query($con,$sql))
            {
                $to_mail="namratarumal2406@gmail.com";
                echo '<script> alert("Registration Successfully Completed")
                window.location.href="admin/loginuser.php";
                </script>';
            }
            else
            {
                echo "error".$con->error;
            }
        }
        else
        {
            echo '<script> alert("Confirm password not match")</script>';
        }
    }
   }
     else{
    echo '<script> alert("image not found")</script>';
    }
    
    
    
   
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gayatri Infotech</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <?php
    include("header.php");
    ?>
    <!-- header-end -->
    
        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg overlay2" style="background-image:url(../image/img5.jpg);height:50px;">
                <h3>Registration form</h3>
            </div>
            <!-- bradcam_area_end -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Registration form</h2>
                    </div>
                    <div class="col-lg-8">
                        <!--<form class="form-contact contact_form" action="" method="post" id="contactForm" >-->
                        <form method="post" enctype="multipart/form-data">
                        <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Full Name :</label>
                                        <input class="form-control valid" name="name"
                                         id="name" type="text"  placeholder="Enter your name" pattern="^[a-zA-Z ]+" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Email :</label>
                                        <input class="form-control valid" name="email"
                                         id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" placeholder = 'Enter email address' pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Password :</label>
                                        <input class="form-control valid" name="pass"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder = 'Enter password' required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Confirm Password :</label>
                                        <input class="form-control valid" name="cpass" id="email" type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder = 'Confirm password' required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Qualification :</label>
                                        <select name="qualification" class="form-control" required>
                                         <option value="">Qualification</option> 
                                         <option value="BCA">BCA</option> 
                                         <option value="MCA">MCA</option> 
                                         <option value="BE">BE</option> 
                                         <option value="ME">ME</option> 
                                         <option value="BSC">BSC</option> 
                                         <option value="MSC">MSC</option> 
                                         <option value="DIPLOMA">DIPLOMA</option> 
                                         <option value="OTHER">OTHER</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Address :</label>
                                        <input type="text" class="form-control" name="address" id="subject"  placeholder="Enter address" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Phone Number :</label>
                                        <input type="text" class="form-control" name="contact" pattern="[0-9]{10}"  placeholder="Enter contact" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Upload Porfile :</label>
                                        <input type="file" class="form-control" name="profile" id="subject"  placeholder="Enter address" required>
                                    </div>
                                </div>
                                <div style="width:70%; margin-left:20px;">
                                    <div class="form-group" >
                                        <input name="btn"  type="submit" value="Register" style="width:20%;
                                        height:50px; background-color:orange;border-color:orange; 
                                        font-size:20px;">
                                    </div>
                                </div>
                                <!--<div>
                                    <div style=" margin-left:-400px;">
                                        <button name="btn"  type="submit"  style="width:20%;
                                        height:50px; background-color:orange;border-color:orange; 
                                        font-size:20px;"><a href="admin/loginuser.php">Login</a></button>
                                    </div>
                                </div>-->

                            </div>
                            </form>
                            
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Gayatri Infotech</h3>
                                <p>9/4, Shri Markendaya Yantramag Dharak Society, Near New WIT College, Next to Upahar Bakery lane, Solapur - 413006.</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+91 9422781840
                                   </h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>gayatriinfotech123@gmail.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
    <!-- footer -->
    <?php
    include("footer.php");
    ?>
    <!-- footer -->
        <!-- link that opens popup -->
    
        <!-- form itself end-->
        <form id="test-form" class="white-popup-block mfp-hide">
            <div class="popup_box ">
                <div class="popup_inner">
                    <div class="logo text-center">
                        <a href="#">
                            <img src="img/form-logo.png" alt="">
                        </a>
                    </div>
                    <h3>Sign in</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <input type="email" placeholder="Enter email">
                            </div>
                            <div class="col-xl-12 col-md-12">
                                <input type="password" placeholder="Password">
                            </div>
                            <div class="col-xl-12">
                                <button type="submit" class="boxed_btn_orange">Sign in</button>
                            </div>
                        </div>
                    </form>
                    <p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form2">Sign Up</a> </p>
                </div>
            </div>
        </form>
        <!-- form itself end -->
    
        <!-- form itself end-->
        <form id="test-form2" class="white-popup-block mfp-hide">
            <div class="popup_box ">
                <div class="popup_inner">
                    <div class="logo text-center">
                        <a href="#">
                            <img src="img/form-logo.png" alt="">
                        </a>
                    </div>
                    <h3>Resistration</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <input type="email" placeholder="Enter email">
                            </div>
                            <div class="col-xl-12 col-md-12">
                                <input type="password" placeholder="Password">
                            </div>
                            <div class="col-xl-12 col-md-12">
                                <input type="Password" placeholder="Confirm password">
                            </div>
                            <div class="col-xl-12">
                                <button type="submit" class="boxed_btn_orange">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        <!-- form itself end -->
    
        <!-- JS here -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/scrollIt.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/nice-select.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/gijgo.min.js"></script>
    
        <!--contact js-->
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>
    
        <script src="js/main.js"></script>
    </body>
    
    </html>