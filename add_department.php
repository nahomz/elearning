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
                                <a href="add_department.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Department</a>
                                <a href="department.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Department Entry</div>
                                        <?php 
                                        if(isset($_GET['id'])){
                                            $dept = mysqli_query($conn, "SELECT * FROM department where dep_id = {$_GET['id']}");
                                            foreach(mysqli_fetch_array($dept) as $k => $v){
                                                $$k = $v;
                                            }
                                        }
                                        ?>
                                        <form class="form-horizontal" method="POST">
                                            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Department:</label>
                                                <div class="controls">
                                                    <input type="text" name="d" id="inputPassword" placeholder="Department" value="<?php echo isset($department) ? $department : '' ?>" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Person In Charge:</label>
                                                <div class="controls">
                                                    <input type="text" name="p" value="<?php echo isset($incharge) ? $incharge : '' ?>"  id="inputPassword" placeholder="Person In Charge" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Title:</label>
                                                <div class="controls">
                                                    <input type="text" name="t" id="inputPassword" value="<?php echo isset($title) ? $title : '' ?>"  placeholder="Title" required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Department</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $d = $_POST['d'];
                                            $p = $_POST['p'];
                                            $t = $_POST['t'];


                                            if(empty($_POST['id']))
                                            mysqli_query($conn,"insert into department (department,incharge,title) values ('$d','$p','$t')") or die(mysqli_error());
                                            else
                                            mysqli_query($conn,"UPDATE department set department = '$d',incharge = '$p',title = '$t' where dep_id = {$_POST['id']} ") or die(mysqli_error());

                                            echo('<script>location.href="department.php"</script>');
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


