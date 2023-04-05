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
                        <li><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>&nbsp;Subjects
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
                        <li    class="active"><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;Students
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>


                    </ul>
                </div>

            </div>
            <div class="span9">
                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;Students Table</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Photo</th>
                                <th>Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn,"select * from student") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $student_id = $row['student_id'];
                                ?>




                                <tr class="odd gradeX">
                                    <td width="50"><img class="img-rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></td>
                                    <td><?php echo $row['firstname'] . " " . $row['middle_name'] . " " . $row['lastname']; ?></td> 



                                    <td width="50">
                                        <a href="#course_id<?php echo $student_id; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-plus-sign-alt icon-large"></i></a>

                                    </td>
                                    <!-- user delete modal -->
                            <div id="course_id<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info">Are you Sure you Want to <strong>Add</strong>&nbsp; this Student?</div>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST">
                                        <input type="hidden" name="teacher_id" value="<?php echo $session_id; ?>">
                                        <input type="hidden" name="student_id" value="<?php echo $student_id ?> ">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                        <button name="save1"  class="btn btn-info"><i class="icon-plus icon-large"></i>&nbsp;Add</button>
                                    </form>
                                </div>
                            </div>
                            <!-- end delete modal -->

                            </tr>
                        <?php } ?>
                        <?php
                        if (isset($_POST['save1'])) {
                            $teacher_id = $_POST['teacher_id'];
                            $student_id = $_POST['student_id'];

                            $error_query = mysqli_query($conn,"select * from teacher_student where teacher_id='$teacher_id' and student_id='$student_id'") or die(mysqli_error());
                            $error_row = mysqli_fetch_array($error_query);
                            $count = mysqli_num_rows($error_query);

                            if ($count > 0) {
                                ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    Student Already Exist
                                </div>
                                <?php
                            } else {

                                mysqli_query($conn,"insert into teacher_student (teacher_id,student_id) values('$teacher_id','$student_id')") or die(mysqli_error());

                                echo('<script>location.href = "students.php"</script>');
                            }
                        }
                        ?>


                        </tbody>
                    </table>
                </div>




            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>






</body>
</html>


