<?php include('session.php'); ?>
<?php include('header.php'); ?>
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
                                <a  href="add_user.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add User</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">

                        <div class="hero-unit-3">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;User Table</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from user") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $user_id = $row['user_id'];
                                        ?>
                                        <tr class="odd gradeX">
                                            
                                                         <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            
                                            $('#e<?php echo $user_id; ?>').tooltip('show')
                                            $('#e<?php echo $user_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            
                                            $('#d<?php echo $user_id; ?>').tooltip('show')
                                            $('#d<?php echo $user_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                            
                                            <td><?php echo $row['username']; ?></td> 
                                            <td><?php echo $row['password']; ?></td> 
                                            <td><?php echo $row['firstname']; ?></td> 
                                            <td><?php echo $row['lastname']; ?></td> 
                                            <td width="100">
                                                <a rel="tooltip"  title="Delete User" id="d<?php echo $user_id; ?>" href="#userdel<?php echo $user_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                                <a rel="tooltip"  title="Edit User" id="e<?php echo $user_id; ?>" href="#" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                            </td>
                                            <!-- user delete modal -->
                                    <div id="userdel<?php echo $user_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp;<?php echo $row['firstname'] . "  " . $row['lastname']; ?>?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_user.php<?php echo '?id=' . $user_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
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


