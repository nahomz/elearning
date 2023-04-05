<?php
unset($_SESSION['id']);
session_start();
session_destroy();
header('location:login_teacher.php')
?>
