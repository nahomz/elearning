<!DOCTYPE html>
<html lang="en">
    <head>
    <?php 
    
    session_start();
    session_regenerate_id();
    ?>
        <title>Rift Valley E-learning System</title>
        <link href="admin/img/chmsc.png" rel="icon" type="image">
        <link href="admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link href="admin/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen">
        <link href="admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="admin/css/DT_bootstrap.css">
        <?php include('admin/connect.php'); ?>
    </head>
    <script src="admin/js/jquery.js" type="text/javascript"></script>
    <script src="admin/js/bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript" charset="utf-8" language="javascript" src="admin/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="admin/js/DT_bootstrap.js"></script>
    <script type='text/javascript' language='javascript' src='js/ndhui.js'></script>


<!--slider -->
    <link rel="stylesheet" href="admin/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/css/nivo-slider.css" type="text/css" media="screen" /> 

    <script type="text/javascript" src="admin/js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
        });
    </script>
<!--end slider -->