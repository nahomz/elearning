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
                                <a href="add_course.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Subject</a>
                                <a href="subject.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Subject Entry</div>
                                        <?php 
                                        if(isset($_GET['id'])){
                                            $subject = mysqli_query($conn, "SELECT * FROM subject where subject_id = {$_GET['id']}");
                                            foreach(mysqli_fetch_array($subject) as $k => $v){
                                                $$k = $v;
                                            }
                                        }
                                        ?>
                                        <form class="form-horizontal" method="POST">

                                            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Subject Code:</label>
                                                <div class="controls">
                                                    <input type="text" name="sc" id="inputPassword" placeholder="Subject Code" required value="<?php echo isset($subject_code) ? $subject_code : "" ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Subject Title:</label>
                                                <div class="controls">
                                                    <input type="text" name="st" id="inputPassword" placeholder="Subject Title" required value="<?php echo isset($subject_title) ? $subject_title : "" ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Cateogry:</label>
                                                <div class="controls">
                                                 
                                                    <select name="c" required>
                                                        <option></option>
                                                        <option <?php echo isset($category) && $category == "Major" ? 'selected' : ''  ?>>Major</option>
                                                        <option <?php echo isset($category) && $category == "Minor" ? 'selected' : ''  ?>>Minor</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Subject</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $sc = $_POST['sc'];
                                            $st = $_POST['st'];
                                            $category = $_POST['c'];


                                            if(empty($_POST['id']))
                                            mysqli_query($conn,"insert into subject (subject_code,subject_title,category) values ('$sc','$st','$category')") or die(mysqli_error());
                                            else
                                            mysqli_query($conn,"UPDATE subject set subject_code = '$sc',subject_title ='$st' ,category = '$category' where subject_id = {$_POST['id']}") or die(mysqli_error());

                                            echo('<script>location.href = "subject.php"</script>');
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


