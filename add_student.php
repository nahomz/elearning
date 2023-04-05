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
                            <a href="student.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            <br><br>
                            <?php 
                            if(isset($_GET['id'])){
                                $subject = mysqli_query($conn, "SELECT * FROM student where student_id = {$_GET['id']}");
                                foreach(mysqli_fetch_array($subject) as $k => $v){
                                    $$k = $v;
                                }
                            }
                            ?>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Username</label>
                                    <div class="controls">
                                        <input type="text" name="un" id="inputEmail" placeholder="Username" required value="<?php echo isset($username) ? $username : "" ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="password" name="p" id="inputPassword" placeholder="Password" <?php echo (isset($password)) ? "" : 'required' ?>>
                                        <?php echo (isset($password)) ? "<i>Leave this blank if you dont want to change your password.</i>" : '' ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Firstname</label>
                                    <div class="controls">
                                        <input type="text" name="fn" id="inputEmail" placeholder="Firstname" required  value="<?php echo isset($firstname) ? $firstname : "" ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Lastname</label>
                                    <div class="controls">
                                        <input type="text" name="ln" id="inputEmail" placeholder="Lastname" value="<?php echo isset($lastname) ? $lastname : "" ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Middlename</label>
                                    <div class="controls">
                                        <input type="text" name="mn" id="inputEmail" placeholder="Middlename" value="<?php echo isset($middle_name) ? $middle_name : "" ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="font" <?php echo (isset($location)) ? "" : 'required' ?>> 
                                    </div>
                                </div>
                                <img src="<?php echo isset($location) && is_file($location) ? $location : '' ?>" alt="">
                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="submit" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                                    </div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['submit'])) {
                                $un = $_POST['un'];
                                $p = $_POST['p'];
                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $mn = $_POST['mn'];

                                
                                if(!empty($_FILES["image"]["tmp_name"])){
                                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                    $image_name = addslashes($_FILES['image']['name']);
                                    $image_size = getimagesize($_FILES['image']['tmp_name']);
                                    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
                                    $location = "uploads/" . $_FILES["image"]["name"];
                                }
                                
                                if(empty($_POST['id']))
                                mysqli_query($conn,"insert into student (username,password,firstname,lastname,middle_name,location)
                                    values ('$un','$p','$fn','$ln','$mn','$location')                                    
                                    ") or die(mysqli_error());
                                else{
                                    if(!empty($p)){
                                        $pw = " , password='$p' ";
                                    }else{
                                        $pw = '';
                                    }
                                    if(isset($location)){
                                        $loc = " , location='$location' ";
                                    }else{
                                        $loc = '';
                                    }
                                    mysqli_query($conn,"UPDATE student set
                                        username='$un',
                                        firstname = '$fn',
                                        lastname = '$ln',
                                        middle_name = '$mn'
                                        $loc
                                        $pw where student_id = {$_POST['id']}                                    
                                        ") or die(mysqli_error());
                                }

                                echo('<script>location.href = "student.php"</script>');
                            }
                            ?>


                        </div>

                    </div>
                </div>
<?php include('footer.php'); ?>
            </div>
        </div>
    </div>





</body>
</html>


