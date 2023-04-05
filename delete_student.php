<?php
include('admin/connect.php');
$get_id=$_GET['id'];

mysqli_query($conn,"delete from student where student_id='$get_id'")or die(mysqli_error());
header('location:students.php');

?>