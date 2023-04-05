
<!-- modal -->

<div id="teacher" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">

    </div>
    <div class="modal-body">

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Login Teacher!</strong>&nbsp;Please Enter the Details Below.
        </div>
        <form class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Username</label>
                <div class="controls">
                    <input type="text" name="username" id="inputEmail" placeholder="Username">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                    <input type="password" name="password" id="inputPassword" placeholder="Password">
                </div>
            </div>


            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="login_teacher" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
                </div>


            </div>

            <?php
            if (isset($_POST['login_teacher'])) {

               function clean($str) {
                global $conn;
                    $str = @trim($str);
                    $str = stripslashes($str);
                    return mysqli_real_escape_string($conn,$str);
                }

                $username = clean($_POST['username']);
                $password = clean($_POST['password']);

                $query = mysqli_query($conn,"select * from teacher where username='$username' and password='$password'") or die(mysqli_error());
                $count = mysqli_num_rows($query);
                $row = mysqli_fetch_array($query);


                if ($count > 0) {
                    $_SESSION['id'] = $row['teacher_id'];
                    echo('<script>location.href = "teacher_home.php"</script>');
                    session_write_close();
                    exit();
                } else {
                    session_write_close();
                    ?>
                    <div class="pull-right">   
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert alert-danger"><i class="icon-remove-sign"></i>&nbsp;Access Denied</div>
                    </div>
                    <?php
                    exit();
                }
            }
            ?>
        </form>


        <!-- teacher -->




    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign icon-large"></i>&nbsp;Close</button>

    </div>
</div

<!-- end modal -->