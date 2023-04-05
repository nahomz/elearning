<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navbar.php'); ?>

            <div class="container">

                <div class="row-fluid">
                    <div class="span2">
                        <!-- left nav -->
                        <ul class="nav nav-tabs nav-stacked">

                            <li class="active">
                                <a  href="add_department.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Department</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Department Table</strong>
                                </div>
                                <thead>
                                    <tr>

                                        <th>Department</th>
                                        <th>Person In charge</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from department") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $dep_id = $row['dep_id'];
                                        ?>
                                        <tr class="odd gradeX">

                                            <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                        
                                            $('#e<?php echo $dep_id; ?>').tooltip('show')
                                            $('#e<?php echo $dep_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                        
                                            $('#d<?php echo $dep_id; ?>').tooltip('show')
                                            $('#d<?php echo $dep_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <td><?php echo $row['department']; ?></td> 
                                    <td><?php echo $row['incharge']; ?></td> 
                                    <td><?php echo $row['title']; ?></td> 
                                    <td width="100">
                                        <a rel="tooltip"  title="Delete Department" id="d<?php echo $dep_id; ?>" href="#dep_id<?php echo $dep_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <a el="tooltip"  title="Edit Department" id="e<?php echo $dep_id; ?>" href="add_department.php?id=<?php echo $dep_id ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    </td>
                                    <!-- user delete modal -->
                                    <div id="dep_id<?php echo $dep_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp; this Department?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_dep.php<?php echo '?id=' . $dep_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
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


