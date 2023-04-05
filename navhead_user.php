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

                    <div class="nav-collapse collapse">
                        <!-- .nav, .navbar-search, .navbar-form, etc -->
                       <i class="icon-facebook-sign icon-large" id="color_white"></i>
                        <i class="icon-twitter icon-large" id="color_white"></i>
                        <i class="icon-google-plus icon-large" id="color_white"></i>
                        <i class="icon-github-alt icon-large" id="color_white"></i>
                        <i class="icon-linkedin-sign icon-large" id="color_white"></i>
                        <div class="pull-right">
                            <form class="navbar-search pull-left">
                                
                                <i class="icon-search icon-large" id="color_white"></i>
                                <input type="text" class="search-query" placeholder="Search">
                            </form>
                        </div>

                        <!-- end collapse -->
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
                             <img src="admin/images/head12.png">

                            </div>
                            <div class="span6">
                                <div class="pull-right">
                                    <!--- login button -->							
                                  <?php 
                                    $student_query=mysqli_query($conn,"select * from teacher where teacher_id='$session_id'")or die(mysqli_error());
                                    $teacher_row=  mysqli_fetch_array($student_query);
                                    ?>
                                    
                                     <img  src="admin/<?php echo $teacher_row['location']; ?>"  class="img img-rounded" id="picture">
                                        &nbsp;
                                    <div class="btn-group">
                                       
                                        <button class="btn btn-success"><i class="icon-user icon-large"></i>&nbsp; <?php echo $user_row['firstname'] . " " . $user_row['lastname']; ?></button>
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#logout" role="button"  data-toggle="modal"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
                                        </ul>

                                    </div>

                                    <?php include('logout_modal.php') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>