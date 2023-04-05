<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navbar.php'); ?>

            <div class="container">

                <div class="row-fluid">

                    <div class="span12">
                        <div class="hero-unit-3">

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Materials Table</strong>
                                </div>
                                <thead>
                                    <tr>


                                        <th>File Name</th>
                                        <th>Description</th>
                                        <th>Date Upload</th>
                                        <th>Upload By</th>               
                                        <th>Class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from files") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $file_id = $row['file_id'];
                                        $teacher_id = $row['teacher_id'];
                                        $class_id = $row['class_id'];

                                        $teacher_query = mysqli_query($conn,"select * from teacher where teacher_id='$teacher_id'") or die(mysqli_error());
                                        $teacher_row = mysqli_fetch_array($teacher_query);

                                        $class_query = mysqli_query($conn,"select * from class where class_id='$class_id'") or die(mysqli_error());
                                        $class_row = mysqli_fetch_array($class_query);
                                        ?>
                                        <tr class="odd gradeX">


                                    <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                    
                                            $('#d<?php echo $file_id; ?>').tooltip('show')
                                            $('#d<?php echo $file_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    
                                    <td><?php echo $row['fname']; ?></td> 
                                    <td><?php echo $row['fdesc']; ?></td> 
                                    <td><?php echo $row['fdatein']; ?></td> 
                                    <td><?php echo $teacher_row['firstname'] . "" . $teacher_row['lastname']; ?></td> 
                                    <td><?php echo $class_row['course_id']; ?></td> 
                                    <td width="50">
                                        <a rel="tooltip"  title="Delete Material" id="d<?php echo $file_id; ?>" href="#course_id<?php echo $file_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                  
                                    </td>
                                    <!-- user delete modal -->
                                    <div id="course_id<?php echo $file_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp; this Material?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_file.php<?php echo '?id=' . $file_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                        </div>
                                    </div>
                                    <!-- end delete modal -->

                                    </tr>
                                <?php } ?>
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


