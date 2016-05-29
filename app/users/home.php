<?php
session_start();
include("../../confs/stuff_auth.php");
include("../../confs/config.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/simple-sidebar.css" rel="stylesheet">
    <link href="../bootstrap/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/main.js"></script>
</head>
<body>
<?php include ("../../menu/user_in_menu.php"); ?>
<div id="wrapper">
    <?php include("../../menu/user_in_up_menu.php"); ?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Orders for today ( <?php echo date("d-m-Y") ?> )</div>
                    <div class="panel-body">
                        <ul class="orders" id="show_user_order">

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

</div>




<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
</body>
</html>