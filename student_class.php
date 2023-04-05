<?php
include('header.php');
include ('session.php');
$user_query = mysqli_query($conn,"select * from student where student_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);
?>
<body>

    <?php include('navhead_student.php'); ?>

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
                            <a href="student_home.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a>

                        </li>
                        <li class="active">
                            <a href="student_class.php"><i class="icon-group icon-large"></i>&nbsp;Class
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
                            <strong><i class="icon-user icon-large"></i>&nbsp;My Classes</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Class</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = mysqli_query($conn,"select * from sws where  student_id='$session_id'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $class_id = $row['class_id'];
                                $teacher_id = $row['teacher_id'];

                                $teacher_query = mysqli_query($conn,"select * from teacher where teacher_id='$teacher_id'") or die(mysqli_error());
                                $teacher_row = mysqli_fetch_array($teacher_query);
                                ?>
                                <tr class="odd gradeX">


                                    <td><?php echo $row['cys']; ?></td>
                                    <td><a rel="tooltip"  title="View Class" id="v<?php echo $class_id; ?>"  href="class_student.php<?php echo '?id=' . $class_id; ?>" class="btn btn-info">&nbsp;<i class="icon-file-alt icon-large"></i>&nbsp;<?php echo $row['subject_id']; ?></a></td> 
                                    <td><?php echo $teacher_row['firstname'] . " " . $teacher_row['lastname']; ?></td>   


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


