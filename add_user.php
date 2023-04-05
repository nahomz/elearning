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
                                <a href="add_user.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add User</a>
                                <a href="user.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">

					<div class="hero-unit-3">
                        <ul class="thumbnails">
                            <li class="span7">
                                <div class="thumbnail">
                                    <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add User Account</div>

                                    <form class="form-horizontal" method="POST">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Username:</label>
                                            <div class="controls">
                                                <input type="text" name="un" id="inputEmail" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password:</label>
                                            <div class="controls">
                                                <input type="password" name="p" id="inputPassword" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">FirstName:</label>
                                            <div class="controls">
                                                <input type="text" name="fn" id="inputPassword" placeholder="FirstName" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">LastName:</label>
                                            <div class="controls">
                                                <input type="text" name="ln" id="inputPassword" placeholder="LastName" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">

                                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save User</button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                    if (isset($_POST['save'])) {

                                        $un = $_POST['un'];
                                        $p = $_POST['p'];
                                        $fn = $_POST['fn'];
                                        $ln = $_POST['ln'];
                                        
                                        mysqli_query($conn,"insert into user (username,password,firstname,lastname) values ('$un','$p','$fn','$ln')")or die(mysqli_error());
                                        echo('<script>location.href = "user.php"</script>');
                                    }
                                    ?>

                                </div>
                            </li>

                        </ul>
						</div>



                    </div>
                </div>

                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>




</body>
</html>


