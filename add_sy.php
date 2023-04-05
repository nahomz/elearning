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
                                <a href="add_sy.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add School Year</a>
                                <a href="sy.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>Add School Year</div>

                                        <form class="form-horizontal" method="POST">

                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">School Year:</label>
                                                <div class="controls">
                                                    <input type="text" name="sy" id="inputPassword" placeholder="School Year" required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save School Year</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $sy = $_POST['sy'];


                                            mysqli_query($conn,"insert into sy (sy) values ('$sy')") or die(mysqli_error());
                                            echo('<script>location.href = "sy.php"</script>');
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


