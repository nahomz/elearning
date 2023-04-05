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
                        <li><a href="index.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>

                        <li><a href="sitemap.php"><i class="icon-sitemap icon-large"></i>&nbsp;Site Map
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li class="active"><a href="contact.php"><i class="icon-envelope-alt icon-large"></i>&nbsp;Contact Us
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
                    <strong><i class="icon-phone-sign icon-large"></i>&nbsp;Directories!</strong>&nbsp;
                </div>
                <div class="hero-unit-3">

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="alert alert-success">  Talisay Campus </div>

                            <div class="row-fluid">
                                <div class="span6">

                                    <p><i class="icon-circle"></i>&nbsp;Lab School - 712-0848</p>
                                    <p><i class="icon-circle"></i>&nbsp;Accounting - 495-5560</p>
                                    <p><i class="icon-circle"></i>&nbsp;President's Office - 495-4064(telefax)</p>
                                    <p><i class="icon-circle"></i>&nbsp;  VPA/PME - 495-1635</p>
                                    <p><i class="icon-circle"></i>&nbsp;  Registrar Office - 495-4657(telefax)</p>
                                    <p><i class="icon-circle"></i>&nbsp;  Cashier - 712-7272</p>
                                    <p><i class="icon-circle"></i>&nbsp;  CIT - 712-0670</p>
                                    <p><i class="icon-circle"></i>&nbsp;  SAS/COE - 495-6017</p>
                                    <p><i class="icon-circle"></i>&nbsp;  BAC - 712-8404(telefax)</p>
                                    <p><i class="icon-circle"></i>&nbsp;  Records - 495-3470</p>


                                </div>
                                <div class="span6">

                                    <p><i class="icon-circle"></i>&nbsp;  Supply - 495-3767</p>
                                    <p><i class="icon-circle"></i>&nbsp;Internet Lab - 712-6144/712-6459</p>
                                    <p><i class="icon-circle"></i>&nbsp;COA - 495-5748</p>
                                    <p><i class="icon-circle"></i>&nbsp; Guard House - 476-1600</p>
                                    <p><i class="icon-circle"></i>&nbsp;HRM - 495-4996</p>
                                    <p><i class="icon-circle"></i>&nbsp;Extension - 457-2819</p>
                                    <p><i class="icon-circle"></i>&nbsp;   Canteen - 495-5396</p>
                                    <p><i class="icon-circle"></i> &nbsp;  Research - 712-8464</p>
                                    <p><i class="icon-circle"></i>  &nbsp; Library - 495-5143</p>
                                    <p><i class="icon-circle"></i>  &nbsp; OSA - 495-1152</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- end slider -->
            </div>

        </div>
        <?php include('footer.php'); ?>
    </div>


</div>
</div>






</body>
</html>


