
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

                <ul class="nav">
                    <li><a href="home.php"><i class="icon-home icon-large"></i>&nbsp;Home</a></li>

                    <li><a href="file.php"><i class="icon-folder-open icon-large"></i>&nbsp;File</a></li>
                    <li><a href="teacher.php"><i class="icon-group  icon-large"></i>&nbsp;Teachers</a></li>
                    <li><a href="student.php"><i class="icon-group icon-large"></i>&nbsp;Student</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-folder-close-alt icon-large"> </i>&nbsp;Entry
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="course.php">Course</a></li>
                            <li><a href="subject.php">Subject</a></li>
                            <li><a href="department.php">Department</a></li>
                        </ul>
                    </li>


                    <li><a href="user.php"><i class="icon-user icon-large"></i>&nbsp;User</a></li>
                    <li><a  href="#myModal" role="button"  data-toggle="modal"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
                </ul>
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
                            <br><br>
                            <?php $user_query=mysqli_query($conn,"select * from user where user_id='$session_id'")or die(mysqli_error());
                            $row=  mysqli_fetch_array($user_query);
                            ?>
                            <a href="" class="btn btn-info">Welcome:<i class="icon-user icon-large"></i>&nbsp;<?php echo $row['firstname']." ".$row['lastname']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>