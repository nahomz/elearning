<?php
include('header.php');
include ('session.php');
$user_query = mysqli_query($conn,"select * from teacher where teacher_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);
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
                        <li>
                            <a href="teacher_class.php"><i class="icon-group icon-large"></i>&nbsp;Class
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
                        <li   class="active"><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>&nbsp;Subjects
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



                <a href="teacher_add_subject.php" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Subject</a>
                <br>
                <br>
                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;Subject Table</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Course Code</th>
                                <th>Course Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $teacher_subject_query = mysqli_query($conn,"select * from teacher_suject where teacher_id='$session_id'") or die(mysqli_error());
                            $teacher_row = mysqli_fetch_array($teacher_subject_query);
                            $subject_id = $teacher_row['subject_id'];

                            $query = mysqli_query($conn,"select * from subject where subject_id  in (select subject_id from teacher_suject where teacher_id='$session_id')") or die(mysqli_error());
                            while ($row = mysqli_fetch_assoc($query)) {
                                $id = $row['subject_id'];
                                ?>
                                   <!-- script -->
                            <script type="text/javascript">
                                $(document).ready(function(){
                                
                                    $('#d<?php echo $subject_id; ?>').tooltip('show')
                                    $('#d<?php echo $subject_id; ?>').tooltip('hide')
                                });
                            </script>
                            <!-- end script -->
                            <!-- script -->
                            <script type="text/javascript">
                                $(document).ready(function(){
                                
                                    $('#e<?php echo $subject_id; ?>').tooltip('show')
                                    $('#e<?php echo $subject_id; ?>').tooltip('hide')
                                });
                            </script>
                            <!-- end script -->

                                <tr class="odd gradeX">

                                    <td><?php echo $row['subject_code']; ?></td> 
                                    <td><?php echo $row['subject_title']; ?></td> 

                                    <td width="50">
                                        <a rel="tooltip"  title="Delete Subject" id="d<?php echo $subject_id; ?>" href="#id<?php echo $id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;</a>
                                       
                                    </td>
                                    <!-- user delete modal -->
                            <div id="id<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp; this Subject?</div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                    <a href="delete_teacher_course.php<?php echo '?id=' . $course_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                </div>
                            </div>
                            <!-- end delete modal -->

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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


