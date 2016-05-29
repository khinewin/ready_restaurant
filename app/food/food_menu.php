<?php
session_start();
include("../../confs/auth.php");
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
<?php include ("../../menu/in-menu.php"); ?>
<div id="wrapper">
    <?php include("../../menu/in-up-menu.php"); ?>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-list"></span> Foods Menu</div>
                        <div class="panel-default">
                            <div class="panel panel-body">
                            <div id="msg_delete_food_menu"></div>
                            <table class="table table-bordered">
                                <thead class=alert-info>
                                <tr>
                                    <th class="col-sm-4">Menu Name</th>
                                    <th class="col-sm-6">Remark</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody class="alert-warning" id="show_food_menu"></tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="panel-default">
                        <div class="panel-heading"><div id="show_menu_add"><span class="glyphicon glyphicon-plus-sign"></span> Adding Food Menu</div></div>

                   <div class="panel-body" id="show_menu_add_form">
                       <div id="food_menu_add"></div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <input type="text" name="name" id="name" class="form-control" placeholder="Menu Name *">
                               </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <textarea name="remark" id="remark" class="form-control" placeholder="Remark Menu *"></textarea>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <button class="btn btn-primary btn-block" id="add_food_menu"><span class="glyphicon glyphicon-plus-sign"></span> Add Now</span></button>
                           </div>
                       </div>
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