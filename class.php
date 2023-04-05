<?php
$get_id = $_GET['id'];
include('header.php');
include ('session.php');
$user_query = mysqli_query($conn,"select * from teacher where teacher_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);

$course_query = mysqli_query($conn,"select * from class where teacher_id='$session_id' and class_id='$get_id'") or die(mysqli_error());
$course_row = mysqli_fetch_array($course_query);
$course_id = $course_row['course_id'];
?>
<?php
$query_class = mysqli_query($conn,"select * from class where teacher_id='$session_id' and class_id='$get_id'") or die(mysqli_error());
$row_class = mysqli_fetch_array($query_class);
$id_class = $row_class['class_id'];
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
                        <strong><i class="icon-user icon-large"></i>&nbsp;Students</strong>
                    </div>

                    <div class="row-fluid">
                        <div class="span7">

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <a href="add_student.php<?php echo '?id=' . $id_class; ?>" class="btn btn-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Student</a>
                                <br><br>
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from sws where cys = '$course_id' and class_id='$get_id'") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['sws_id'];
                                        $student_id = $row['student_id'];

                                        $student_query = mysqli_query($conn,"select * from student where student_id='$student_id'") or die(mysqli_error());
                                        $student_row = mysqli_fetch_array($student_query);
                                        ?>
                                        <tr class="odd gradeX">
                                            <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                                                                                
                                            $('#e<?php echo $student_id; ?>').tooltip('show')
                                            $('#e<?php echo $student_id; ?>').tooltip('hide')
                                        });
                                    </script>

                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                                                                                
                                            $('#d<?php echo $student_id; ?>').tooltip('show')
                                            $('#d<?php echo $student_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <td width="50"><img class="img-rounded" src="<?php echo $student_row['location']; ?>" height="50" width="50"></td>
                                    <td><a href="">&nbsp;<i class="icon-user icon-large"></i>&nbsp;<?php echo $student_row['firstname'] . " " . $student_row['lastname']; ?></a></td>


                                    <td width="50">



                                        <a rel="tooltip"  title="Delete Student" id="d<?php echo $student_id; ?>" href="#delete<?php echo $student_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                    </td>
                                    <!-- user delete modal -->
                                    <!-- delete file modal -->
                                    <div id="delete<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp;This Student?</div>
                                        </div>
                                        <div class="modal-footer">

                                            <form method="post" action="delete_student1.php">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                <input type="hidden" name="class_id" value="<?php echo $id_class; ?>">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

                                                <button class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end delete modal -->




                                    <!-- end delete modal -->

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="span5">


                            <a href="upload.php<?php echo '?id=' . $id_class; ?>" class="btn"><i class="icon-upload"></i>&nbsp;Upload A File</a>
                            <br><br>
                            <div class="alert alert-info"><i class="icon-file icon-large"></i>&nbsp;Uploaded Files</div>
                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $file_query = mysqli_query($conn,"select * from files where class_id='$id_class'") or die(mysqli_error());
                                    while ($file_row = mysqli_fetch_array($file_query)) {
                                        $file_id = $file_row['file_id'];
                                        ?>

                                    
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                                                                                
                                            $('#d<?php echo $file_id; ?>').tooltip('show')
                                            $('#d<?php echo $file_id; ?>').tooltip('hide')
                                        });
                                    </script>


                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                                                                                
                                            $('#de<?php echo $file_id; ?>').tooltip('show')
                                            $('#de<?php echo $file_id; ?>').tooltip('hide')
                                        });
                                    </script>


                                    <tr>
                                        <td><?php echo $file_row['fname']; ?>&nbsp;<i class="icon-file"></i></td>
                                        <td width="90">
                                            <a rel="tooltip"  title="Delete File" id="d<?php echo $file_id; ?>" href="#delete<?php echo $file_id; ?>" role="button"  data-toggle="modal"class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                            <a rel="tooltip"  title="Download File" id="de<?php echo $file_id; ?>" href="<?php echo $file_row['floc']; ?>" role="button"  data-toggle="modal"class="btn btn-info"><i class="icon-trash icon-upload-alt"></i></a>
                                        </td>
                                    </tr>
                                    <!-- delete file modal -->
                                    <div id="delete<?php echo $file_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp;This File?</div>
                                        </div>
                                        <div class="modal-footer">

                                            <form method="post" action="delete_file.php">
                                                <input type="hidden" name="file_id" value="<?php echo $file_id; ?>">
                                                <input type="hidden" name="class_id" value="<?php echo $id_class; ?>">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

                                                <button class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end delete modal -->
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


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


