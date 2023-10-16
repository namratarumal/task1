
<!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area" style="background:white;">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-3 col-lg-3">
                            <img src="admin/pages/forms/image/gayatri.png" 
                            style="height:50px;margin-left:50px;float:left;">
                            <p style="display: inline-block;float: left;font-weight: bold;color: orange;
                             margin-bottom: 0;margin-left: 10px;font-size:35px;">
                             Gayatri 
                            <span style="display: block;font-size: 15px; font-weight: 500;
                             letter-spacing: 8.5px;text-transform: capitalize; text-align: right;
                             color: orange;border-top: 1px solid #ddd;">
                             Infotech</span></p>
                        </div>
                        <div class="col-xl-7 col-lg-7">
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
                                        <li style="margin-right: 3pc;"><a class="active" href="index.php">Home</a></li>
                                        <li style="margin-right: 3pc;"><a href="all_course.php">All Courses</a></li>
                                        
                                        <li style="margin-right: 3pc;"><a href="about.php">About</a></li>
                                        <li style="margin-right: 3pc;"><a  href="contact.php">Contact</a></li>
                                        <li style="margin-right: 3pc;"><a  href="register.php">Register</a></li>
                                        <!--<li><a class="active" href="session_unset.php">logout</a></li>-->
                                        <!--<li><a href="#">All Batch <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="all_course.php">Offline batch</a></li>
                                                <li><a href="elements.html">Online batch</a></li>
                                                <li><a href="internship.php">Internship</a></li>
                                            </ul>
                                        </li>-->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <div class="live_chat_btn" style="margin-right:50px;">
                                <?php
                                if(!$user)
                                    {
                                        ?>

                                    <li class="nav-item dropdown" style="width:130%;margin-right:20px; ">
                                        <a style="height:45px;width:70%;border-radius:10px;font-wight:bold;font-size:20px;
                                        background:#FDAE5C;" class="nav-link" href="admin/loginuser.php" role="button"  aria-haspopup="true" aria-expanded="false">
                                        Login
                                        </a>
                                        <!--<div class="dropdown-menu" aria-labelledby="navbarDropdown" >-->
                                        <!--<a class="dropdown-item" href="admin/loginuser.php" style="color:black;">Login</a>-->
                                        
                                        
                                    </li>
                                      <?php
                                    }
                                    else
                                    {
                                        $user=$_SESSION['email'];

                                        $nm="select name from registration where email='$user'";
                                            $result1=mysqli_query($con,$nm);
                                            $count1=mysqli_fetch_row($result1);
                                            $sname= $count1[0];
                                        ?>
                                         <li class="nav-item dropdown" style="border:1px solid;margin-right:-10px; ">
                                        <a style="height:45px;width:100%;border-radius:10px;background:#FDAE5C;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $sname;?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                        <a class="dropdown-item" href="session_unset.php" style="color:black;">Logout</a>
                                        <a class="dropdown-item" href="admin/index1.php" style="color:black;">User dashboard</a>
                                        
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