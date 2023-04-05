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
                                <a  href="add_sy.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add School Year</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">

                        <div class="hero-unit-3">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Subject Table</strong>
                                </div>
                                <thead>
                                    <tr>

                                        <th>School Year</th>                                   
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from sy") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $sy_id = $row['sy_id'];
                                        ?>
                                        <tr class="odd gradeX">

                                            <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                
                                            $('#e<?php echo $sy_id; ?>').tooltip('show')
                                            $('#e<?php echo $sy_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                
                                            $('#d<?php echo $sy_id; ?>').tooltip('show')
                                            $('#d<?php echo $sy_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->

                                    <td><?php echo $row['sy']; ?></td> 
                                    <td width="100">
                                        <a rel="tooltip"  title="Delete School Year" id="d<?php echo $sy_id; ?>" href="#sy_id<?php echo $sy_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <a rel="tooltip"  title="Edit School Year" id="d<?php echo $sy_id; ?>" href="#" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    </td>
                                    <!-- user delete modal -->
                                    <div id="sy_id<?php echo $sy_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp; this School Year?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_sy.php<?php echo '?id=' . $sy_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
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


