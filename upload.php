<?php
include ('session.php');
include('header.php');
$get_id=$_GET['id'];
$user_query = mysqli_query($conn,"select * from teacher where teacher_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);

$course_query = mysqli_query($conn,"select * from class where teacher_id='$session_id' and class_id='$get_id'") or die(mysqli_error());
$course_row = mysqli_fetch_array($course_query);
$get_id = $_GET['id'];
?>
<body>

    <?php include('navhead_user.php'); ?>

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
                        <li>
                            <a href="teacher_home.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a>

                        </li>
                        <li   class="active">
                            <a href="teacher_class.php"><i class="icon-group icon-large"></i>&nbsp;Class
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
                        <li><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>&nbsp;Subjects
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
                        <li><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;Students
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>


                    </ul>
                </div>

            </div>
            <div class="span9">
                <a href="" class="btn btn-success"><i class="icon-group icon-large"></i>&nbsp;<?php echo $course_row['course_id']; ?></a>
                <br><br>
                <div class="alert alert-success"> 
                    <strong>Subject:&nbsp;<?php echo $course_row['subject_id']; ?></strong>
                </div>


                <div class="hero-unit-3">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><i class="icon-upload-alt icon-large"></i>&nbsp;Upload A File</strong>
                    </div>


                    <form class="form-horizontal" action="upload_save.php" method="post" enctype="multipart/form-data" name="upload" >
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">File</label>
                            <div class="controls">

                                <input name="uploaded_file" type="file" class="input-xlarge" required/>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Name</label>
                            <div class="controls">
                                <input type="text" name="name"  class="input-xlarge" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Description</label>
                            <div class="controls">
                                <textarea name="desc" cols="" rows="" class="input-xlarge" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="btn" /><i class="icon-upload-alt"></i>&nbsp;Upload</button>
                            </div>
                        </div>
                    </form>





                    <!-- end slider -->
                </div>
            </div>

        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>






</body>
</html>


