<?php
include('header.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
<body>

    <div class="row-fluid">
        <div class="span12">


            <div class="navbar navbar-fixed-top navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">

                        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>

                        <!-- Be sure to leave the brand out there if you want it shown -->


                        <!-- Everything you want hidden at 940px or less, place within here -->



                        <div class="nav-collapse collapse">
                            <!-- .nav, .navbar-search, .navbar-form, etc -->


                        </div>

                    </div>
                </div>
            </div>

            <div class="hero-unit-header">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span12">


                            <div class="row-fluid">
                                <div class="span6">
                                    <img src="images/head12.png">
                                </div>
                                <div class="span6">

                                    <div class="pull-right">
                                        <i class="icon-calendar icon-large"></i>
                                        <?php
                                        $Today = date('y:m:d');
                                        $new = date('l, F d, Y', strtotime($Today));
                                        echo $new;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row-fluid">
                       <div class="span6">
                    <div class="hero-unit-3">
                        <div class="alert alert-info">Mission</div>
                        <p>
                            To provide a highly developed form of teaching through maximizing the use of technology which will somehow give an easier and efficient way of learning that will make them to be competitive and productive citizens of the society. 

                        </p>
                    </div>
                    <div class="hero-unit-3">
                        <div class="alert alert-info">Vision</div>
                        <p>
                            To be able to prove to people that Filipinos also know how to cope up with the development in technology this will provide an easier way of teaching and a better form of learning. 
                        </p>
                    </div>
                </div>
                    <div class="span6">

                        <div class="alert alert-info"><strong>Login</strong> Please Enter The Details Below</div>
                        <!-- login -->
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Username</label>
                                <div class="controls">
                                    <input type="text" name="username" id="inputEmail" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" id="inputPassword" placeholder="Password" required>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="login" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
                                </div>
<br>
                                <?php
                                if (isset($_POST['login'])) {

                                    function clean($str) {
                                        global $conn;
                                        $str = @trim($str);
                                        $str = stripslashes($str);
                                        return mysqli_real_escape_string($conn,$str);
                                    }

                                    $username = clean($_POST['username']);
                                    $password = clean($_POST['password']);

                                    $query = mysqli_query($conn,"select * from user where username='$username' and password='$password'") or die(mysqli_error());
                                    $count = mysqli_num_rows($query);
                                    $row = mysqli_fetch_array($query);


                                    if ($count > 0) {
                                       
                                        $_SESSION['id'] = $row['user_id'];
                                        echo('<script>location.href = "home.php"</script>');
                                        session_write_close();
                                        exit();
                                    } else {
                                        session_write_close();
                                        ?>

                                     
                                        <div class="alert alert-danger"><i class="icon-remove-sign"></i>&nbsp;Access Denied</div>

                                        <?php
                                      
                                    }
                                }
                                ?>
                            </div>
                

                    </form>
                </div>
                   <?php include('footer_fixed.php'); ?>
            </div>
      
        </div>
    </div>
</div>






</body>
</html>


