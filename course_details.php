<?php
require("config.php");
session_start();

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
     <div class="courses_details_banner" style="background-image:url(../image/img5.jpg);height:50px;">
         <div class="container" >
             <div class="row">
                 <div class="col-xl-6">
                 <?php
                $id=$_GET['id'];
                
                $sql="select * from basic_course where id=$id";
                $res=mysqli_query($con,$sql);
                while($rw=mysqli_fetch_row($res))
                {
                ?>
                     <div class="course_text">
                            <h3><?php echo $rw[2];?> <br></h3>
                            <div class="prise">
                                
                               
                            </div>
                            <div class="rating">
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <span>(4.5)</span>
                            </div>
                            
                     </div>
                     <?php
                }
                ?>
                 </div>
             </div>
         </div>
    </div>
    <!-- bradcam_area_end -->

    <div class="courses_details_info">
        <div class="container">
            <div class="row">
            <?php
                $id=$_GET['id'];
               
                $sql="select * from basic_course where id=$id";
                $res=mysqli_query($con,$sql);
                while($rw=mysqli_fetch_row($res))
                {
                ?>
                <div class="col-xl-10 col-lg-10">
                    <div class="single_courses">
                        <h3><?php echo $rw[2];?></h3>
                        <p><?php echo $rw[4];?></p>
                    <h3 class="second_title">Course Outline</h3>
                    </div>
                    <div class="outline_courses_info">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <i class="fa fa-plus" style="font-size:24px;color:#6610f2;"></i>Content
                                                    <a download="<?php echo $rw[6];?>" href="admin/pages/forms/image/<?php echo $rw[6];?>" ><button style="float:right;margin-right:10px;margin-top:10px;height:40px;font-size:15px;color:;background:orange;border:orange;courser:pointer;">Download pdf</button></a>
                                                
                                    </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php echo $rw[5];?>
                                            </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                <!--<div class="col-xl-5 col-lg-5" style="margin:top:300px;">
                    <div class="courses_sidebar" style="margin-top:100px;border:none;">
                        <div class="feedback_info">
                        <h3></h3>
                        <h3>Duration : <?php echo $rw[7];?></h3>
                        <h3>fees : <?php echo $rw[8];?>/-</h3>
                        <form action="#">
                            <button type="submit" class="boxed_btn"><a download="<?php echo $rw[6];?>" href="admin/pages/forms/image/<?php echo $rw[6];?>">Download pdf</a></button>
                        </form>
                        </div>
                    </div>
                </div>-->
                <?php
                }
                ?>
            </div>
        </div>
    </div>


   

    <!-- testimonial_area_start -->
   
    <!-- testimonial_area_end -->

    <!-- our_courses_start -->
    
    <!-- our_courses_end -->

    <!-- subscribe_newsletter_Start -->
    
    <!-- subscribe_newsletter_end -->

    <!-- our_latest_blog_start -->
    
    <!-- our_latest_blog_end -->


    <!-- footer -->
    <?php
    include("footer.php");
    ?>
    <!-- footer -->

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
                <p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form2">Sign Up</a>
                </p>
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