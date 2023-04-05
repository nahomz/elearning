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
                            <a href="teacher.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            <br>
                            <br>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Username</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="text" name="password" id="inputPassword" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Firstname</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="firstname" placeholder="Firstname" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Lastname</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="lastname" placeholder="Lastname" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Middlename</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="middlename" placeholder="Middlename" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="font" required> 
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">

                                        <select name="department" class="span4" required>
                                            <option></option>
                                            <?php
                                            $query = mysqli_query($conn,"select * from department");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <option><?php echo $row['department']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                                    </div>
                                </div>

                            </form>

                            <?php
                            if (isset($_POST['save'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $middlename = $_POST['middlename'];
                                $department = $_POST['department'];

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
                                $location = "uploads/" . $_FILES["image"]["name"];


                                mysqli_query($conn,"insert into teacher (username,password,firstname,lastname,middlename,department,location)
                        values ('$username','$password','$firstname','$lastname','$middlename','$department','$location')         
") or die(mysqli_error());
                                echo('<script>location.href = "teacher.php"</script>');
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


