<?php
include('admin/connect.php');
$get_id=$_GET['id'];

mysqli_query($conn,"delete from class where classs_id='$get_id'")or die(mysqli_error());
header('location:teacher_class.php');

?>