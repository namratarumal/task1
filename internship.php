<?php
session_start();
$con=mysqli_Connect("localhost","root","","project");
if(isset($_POST['btn2']))
{
   // $email=$_POST['smail'];
   $user=$_SESSION['email'];
    $cname=$_POST['cname'];
    $duration=$_POST['duration'];
    $fees=$_POST['fees'];

    
    $nm="select id from registration where email='$user'";
    $result1=mysqli_query($con,$nm);
    $count1=mysqli_fetch_row($result1);
    $sid= $count1[0];
    
    
    if(!$sid)
    {
        echo '<script> alert("Please login...")</script>';
    }
    else
    {
    $n="select count(id) from student_details where course_name='$cname' and sid=$sid ";
   
    $result=mysqli_query($con,$n);
    $count=mysqli_fetch_row($result);
    if($count[0]=='1')
    {
        echo '<script> alert("course alredy added")</script>';
    }
    else
    {
        $n1="insert into student_details(sid,course_name,duration,fees)values($sid,'$cname','$duration',$fees)";
        if(mysqli_query($con,$n1))
        {
            echo '<script> alert("course added succesefully")</script>';
        }
        else
        {
            echo "error".$con->error;
        }
        
    }
}

}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edumark</title>
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
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area" style="background:black;">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <img src="admin/pages/forms/image/gayatri.png" 
                            style="height:50px;margin-left:-50px;float:left;">
                            <p style="display: inline-block;float: left;font-weight: bold;color: orange;
                             margin-bottom: 0;margin-left: 10px;font-size:35px;">
                             Gayatri 
                            <span style="display: block;font-size: 15px; font-weight: 500;
                             letter-spacing: 8.5px;text-transform: capitalize; text-align: right;
                             color: white;border-top: 1px solid #ddd;">
                             Infotech</span></p>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block" style="color: blue;">
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
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.php">Home</a></li>
                                        <li><a href="all_course.php">All Courses</a></li>
                                        
                                        <li><a href="about.php">About</a></li>
                                        <li><a class="active" href="contact.php">Contact</a></li>
                                        <li><a class="active" href="register.php">Registre</a></li>
                                        <li><a href="#">All Batch <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="all_course.php">Offline batch</a></li>
                                                <li><a href="elements.html">Online batch</a></li>
                                                <li><a href="internship.php">Internship</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <div class="live_chat_btn" style="margin-right:-50px;">
                                <?php
                                if(!$user)
                                    {
                                        ?>

                                    <li class="nav-item dropdown" style="width:130%;margin-right:10px; ">
                                        <a style="height:45px;width:70%;border-radius:10px;font-wight:bold;font-size:20px;
                                        background:#FDAE5C;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Login
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                        <a class="dropdown-item" href="user/login.php" style="color:black;">login</a>
                                        <a class="dropdown-item" href="#" style="color:black;">User dashboard</a>
                                        
                                    </li>
                                      <?php
                                    }
                                    else
                                    {
                                        ?>
                                         <li class="nav-item dropdown" style="border:1px solid;margin-right:-10px; ">
                                        <a style="height:45px;width:100%;border-radius:10px;background:#FDAE5C;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $_SESSION['email'];?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                        <a class="dropdown-item" href="session_unset.php" style="color:black;">Logout</a>
                                        <a class="dropdown-item" href="user/index.php" style="color:black;">User dashboard</a>
                                        
                                    </li>
                                        <?php
                                    }
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg overlay2" style="background-image:url(../image/img5.jpg);">
            <h3>Our Courses</h3>
        </div>
        <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Popular Courses</h3>
                        <p>Your domain control panel is designed for ease-of-use and <br> allows for all aspects of your
                            domains.</p>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <?php
                                $con=mysqli_connect("localhost","root","","project");
                                $sql="select * from courses where id in(2,3,4,5,6,7)";
                                $res=mysqli_query($con,$sql);
                                while($rw=mysqli_fetch_row($res))
                                {
                                    ?>
                                    <div class="col-xl-4 col-lg-4 col-md-6" >
                                        <div class="single_courses" style="height:400px;">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="admin/pages/forms/image/<?php echo $rw[2];?>" 
                                                    style="height:200px;" alt="">
                                                </a>
                                                
                                            </div>
                                        <div class="courses_info">
                                            <span>25 students</span>
                                                <h3><a href="all_course.php?id=<?php echo $rw[0];?>"><?php echo $rw[1];?></a></h3>
                                                <input type="hidden" name="cname" value="<?php echo $rw[1];?>">
                                            </div>
                                            <div class="star_prise d-flex justify-content-between">
                                                <div class="star">
                                                    
                                                    <span style="font-size:20px;color:orange;margin-left:10px;">6 months</span>
                                                </div>
                                                <div class="prise">
                                                    <span class="offer"></span>
                                                    <span class="active_prise" style="font-size:20px;color:orange;margin-left:10px;">
                                                        20000/-
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->


    
    <!--our_courses_end -->

    
    <!-- subscribe_newsletter_Start -->
    <div class="subscribe_newsletter"  style="background:#FFA500;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="newsletter_text">
                        <h3>Subscribe Newsletter</h3>
                        <p>Your domain control panel is designed for ease-of-use and allows for all aspects of your</p>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="newsletter_form">
                        <h4>Your domain control panel is</h4>
                        <form action="#" class="newsletter_form">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" style="background:#3c35ce;">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <!-- subscribe_newsletter_end -->

    <!-- our_latest_blog_start -->
    
    <!-- our_latest_blog_end -->


    <!-- footer -->
    <footer class="footer footer_bg_1" style="background:#333;">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                   <h3 style="color:#FFA500;">Gayatri Infotech</h3>
                                </a>
                            </div>
                            <p>
                                Firmament morning sixth subdue darkness creeping gathered divide our let god moving.
                                Moving in fourth air night bring upon it beast let you dominion likeness open place day
                                great.
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title" style="color:#FFA500;">
                                Courses
                            </h3>
                            <ul>
                                <li><a href="#">C programming</a></li>
                                <li><a href="#">C++ programming</a></li>
                                <li><a href="#">Java</a></li>
                                <li><a href="#">Oracle</a></li>
                                <li><a href="#">Python</a></li>
                            </ul>

                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title" style="color:#FFA500;">
                                Address
                            </h3>
                            <p>
                            9/4, Shri Markendaya Yantramag Dharak Society, Near New WIT College, Next to Upahar Bakery lane, Solapur - 413006.<br>
                            +91 9823140574 <br>
                            info@vertextechnosys.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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