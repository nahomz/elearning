<?php
include('admin/connect.php');
$get_id=$_POST['id'];

mysqli_query($conn,"delete from class where class_id='$get_id'")or die(mysqli_error());
header('location:teacher_subject.php');

?>