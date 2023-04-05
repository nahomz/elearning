<?php
include('admin/connect.php');

$get_id = $_POST['id'];
$class_id=$_POST['class_id'];

mysqli_query($conn,"delete from sws where sws_id='$get_id'") or die(mysqli_error());
?>


<script type="text/javascript">
    window.location="class.php<?php echo '?id=' . $class_id; ?>";                          
</script>


