<?php
include('header.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
<body>

    <?php include('navhead.php'); ?>

    <div class="container">
        <div class="row-fluid">
            <div class="span3">

                <div class="hero-unit-3">
                    <div class="alert-index alert-success">
                        <i class="icon-calendar icon-large"></i>
                        <?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                    </div>
                </div>

                <div class="hero-unit-1">
                    <ul class="nav  nav-pills nav-stacked">


                        <li class="nav-header">Links</li>
                        <li class="active"><a href="#"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>

                        <li><a href="sitemap.php"><i class="icon-sitemap icon-large"></i>&nbsp;Site Map
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="contact.php"><i class="icon-envelope-alt icon-large"></i>&nbsp;Contact Us
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a>                
                        </li>
                        <li class="nav-header">About US</li>
                        <li><a  href="#mission" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Mission
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="#vision" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Vision
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="history.php"><i class="icon-list-alt icon-large"></i>&nbsp;History
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>

                    </ul>
                </div>
                <br>


            </div>
            <div class="span9">



                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Head Up!</strong>&nbsp;Welcome to Carlos Hilado Memorial State College E-Learning Site.
                </div>
                <div class="slider-wrapper theme-default">

                    <form class="form-horizontal" method="post">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Username</label>
                            <div class="controls">
                                <input type="text" name="username" id="inputEmail" placeholder="Username">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Password</label>
                            <div class="controls">
                                <input type="password" name="password" id="inputPassword" placeholder="Password">
                            </div>
                        </div>


                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="login" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
                            </div>


                        </div>

                        <?php
                        if (isset($_POST['login'])) {

                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysqli_real_escape_string($str);
                            }

                            $username = clean($_POST['username']);
                            $password = clean($_POST['password']);

                            $query = mysqli_query($conn,"select * from student where username='$username' and password='$password'") or die(mysqli_error());
                            $count = mysqli_num_rows($query);
                            $row = mysqli_fetch_array($query);


                            if ($count > 0) {
                                $_SESSION['id'] = $row['student_id'];
                                echo('<script>location.href = "student_home.php"</script>');
                                session_write_close();
                                exit();
                            } else {
                                session_write_close();
                                ?>

                                <?php
                                echo('<script>location.href = "error_login.php"</script>');
                            }
                        }
                        ?>

                    </form>
                </div>
                <!-- end slider -->
            </div>

        </div>

    </div>
    <!---------------->
    <div class="container">

        <div class="row-fluid">
            <div class="span12">

                <div class="row-fluid">
                    <div class="span9">
                        <div class="alert alert-success"><i class="icon-file icon-large"></i>&nbsp;<strong>Patag Medical Mission</strong></div>
                        <div class="hero-unit-2">
                            Announcements
                            In support to the thrust of the government to improve the health status of neighboring barangays, the Faculty and Staff of CHMSC ECS Fortune Towne, Bacolod City, launched its Medical Mission in Patag, Silay City. It was conducted last March 2010, to address the health needs of the people. A medical consultation is given to the residents of SitioPatag to attend to their health related problems that may need medical treatment. Medical tablets for headache, flu, fever, antibiotics and others were availed by the residents.
                        </div>

                    </div>
                    <div class="span3">
                        <div class="alert alert-info">
                            <i class="icon-building icon-large"></i>&nbsp;Campuses

                        </div>
                        <div class="hero-unit-3">
                            <p><a href=""><i class="icon-sign-blank"></i>&nbsp;Talisay Campus</a></p>
                            <p><a href=""><i class="icon-sign-blank"></i>&nbsp;Fortune Towne Campus</a></p>
                            <p><a href=""><i class="icon-sign-blank"></i>&nbsp;Binalbagan Campus</a></p>
                            <p><a href=""><i class="icon-sign-blank"></i>&nbsp;Alijis Campus</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <br>
        <div class="alert alert-success"><i class="icon-file icon-large"></i>&nbsp;<strong>Bayan - Anihan Projects</strong></div>
        <div class="hero-unit-2">
            The BAYAN-ANIHAN is a Food Production Program with a battle cry of “GOODBYE GUTOM”, advocating its legacy “Food on the Table for every Filipino Family” through backyard gardening. NGO’s, governmental organizations, private and public sectors, business sectors are the cooperating agencies that support and facilitate this project and Carlos Hilado Memorial State College (CHMSC) is one of the identified partner school. Being a member institution in advocating its thrust, the school through its Extension and Community Services had conducted capability training workshop along this program identifying two deputy coordinators and trainers last November 26,27 and 28, 2009, with the end in view of implementing the project all throughout the neighboring towns, provinces and regions to help address poverty in the country. Program beneficiaries were the selected families of GawadKalinga (GK) in Hope Village, Brgy. Cabatangan, Talisay City, with 120 families beneficiaries; GK FIAT Village in Silay City with 30 beneficiaries; Bonbon Dream Village brgy. E. Lopez, Silay City with 60 beneficiaries; and respectively Had. Teresita and Had. Carmen in Talisay City, Negros Occidental both with 60 member beneficiaries. This program was introduced to 30 household members with the end in view of alleviating the quality standards of their living.
        </div>

        <?php include('footer.php'); ?>
    </div>


</div>
</div>






</body>
</html>


