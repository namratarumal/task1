<?php
session_start();
require("config.php");
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
        //echo '<script> alert("thank you")</script>';
        // $subject = "Join course";
        //     $body = "Hi,$email.Please join :
        //     student registration id:$sid. ";
        //     $sender_email = "From: namratarumal2406@gmail.com";

        //     if(mail($user,$subject,$body,$sender_email))
        //    {
                
        //         echo '<script> alert("course added succesefully")</script>';
        //    }
        //    else
        //    {
        //        echo "email sendig failed..";
        //    }
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
        <div class="bradcam_area breadcam_bg overlay2" style="background-image:url(../image/img5.jpg);height:70px;">
            <h3>Our Courses</h3>
        </div>
        <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses plus_padding">
        <div class="container">
            <div class="row" style="margin-top:-100px;">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Popular Courses</h3>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-2" style="margin-left:-30px;">
                    <div class="course_nav"  style=" width:200%;">
                        <nav>
                        <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive">
                    <table class="table table-striped">
                      
                      <?php 
                      
                       $sql="select * from courses";
                       
                       $res=mysqli_query($con,$sql);
                       while($rw=mysqli_fetch_row($res))
                       {
                           //$str=str_replace(" ","-",$rw[1]);
                      ?>
                      <tbody>
                        <tr style="font-size:20px;">
                            
                            <td><a href="all_course_details.php?id=<?php echo $rw[0];?>"><?php echo $rw[1];?></a></td>
                     </tr>
                      </tbody>
                      <?php
                       }
                       ?>
                    </table>
                  </div>

                </div>
                        
                    </div>
                </div>
            </div>

        </div>
        <div class="all_courses">
            <div class="container" style="margin-top:-400px;width:70%;margin-right:-10px;">
                <div class="tab-content" id="myTabContent" >
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row gx-5" >
                                
                                <?php
                                
                                    $id=$_GET['id'];
                                    //echo $id;
                                    $sql1="select * from basic_course where cid=$id";
                                    $rs=mysqli_query($con,$sql1);
                                    while($row=mysqli_fetch_row($rs))
                                    {
                                    ?> 
                                    
                                        <div class="col-xl-4 col-lg-4 col-md-6" >
                                        <form method="post">
                                            <div class="single_courses" style="height:300px;width:110%;margin-left:-40px;">
                                                <div class="thumb">
                                                    <a href="course_details.php?id=<?php echo $row[0];?>">
                                                        <img src="admin/pages/forms/image/<?php echo $row[3];?>"
                                                        style="height:150px;" alt="">
                                                    </a>
                                                </div>
                                                <div class="courses_info">
                                                    
                                                    <h3><a href="course_details.php?id=<?php echo $row[0];?>"><?php echo $row[2];?></a></h3>
                                                    <input type="hidden" name="cname" value="<?php echo $row[0];?>">    
                                                    <input type="hidden" name="duration" value="<?php echo $row[7];?>">
                                                    <input type="hidden" name="fees" value="<?php echo $row[8];?>">
                                                   <!-- <input type="hidden" name="smail" value="">-->
                                                    <div class="star_prise d-flex justify-content-between">
                                                        <div>
                                                            
                                                                
                                                            <button name="btn2" style="border-radius:10px;height:40px;margin-left:20px;
                                                            background:orange;border-color:orange;margin-top:-20px;width:150%;">Add course</button>
                                                       
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                       <?php
                                    }
                                
                                    ?> 
                                
                                
  
                                
</div> 
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>
    <!-- popular_courses_end-->


    
    <!--our_courses_end -->

    
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