<?php
require("config.php");
session_start();
if(isset($_POST['btn']))
{
    
    $user=$_SESSION['email'];
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $contact=$_POST['contact'];
    $msg=$_POST['message'];

    // $nm="select name from registration where email='$user'";
    // $result1=mysqli_query($con,$nm);
    // $count1=mysqli_fetch_row($result1);
    // $sname= $count1[0];

    $sql="insert into contact(name,email,contact,message)values('$name','$mail','$contact','$msg')";
    if(mysqli_query($con,$sql))
    {
        echo '<script> alert("enquiry send successfully")</script>';
    }
    else
    {
        echo "error".$con->error;
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
                <h3>contact us</h3>
            </div>
            <!-- bradcam_area_end -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    
                    
    
                </div>
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <!--<form class="form-contact contact_form" action="" method="post" id="contactForm" >-->
                        <form method="post">
                        <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="font-size:15px;font-weight:bold;color:black;">Full Name :</label>
                                        <input class="form-control valid" name="name" pattern="^[a-zA-Z ]+" type="text"placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Email :</label>
                                        <input class="form-control valid" name="email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" type="email" placeholder = 'Enter email address'>
                                    </div>
                                </div>
                                <div class="col-12">
                                <label style="font-size:15px;font-weight:bold;color:black;">Phone Number :</label>
                                    <div class="form-group">
                                        <input class="form-control" name="contact" pattern="[0-9]{10}" type="text" placeholder="Enter contact">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label style="font-size:15px;font-weight:bold;color:black;">Subject :</label>
                                        <textarea class="form-control" name="message" id="subject"  placeholder="Enter Subject"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group" >
                                        <input name="btn"  type="submit" value="Submit" style="width:20%;
                                        height:50px; background-color:orange;border-color:orange; 
                                        font-size:20px;">
                                    </div>
                                </div>

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