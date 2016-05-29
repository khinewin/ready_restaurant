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
                        <div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> Foods</div>
                        <div class="panel-default">
                            <div class="panel panel-body">
                                <div id="msg_delete_food"></div>
                              <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead class="alert-info">
                                    <tr>
                                        <th class="col-sm-2">Covers</th>
                                        <th class="col-sm-4">Food Name</th>
                                        <th class="col-sm-3">Categories</th>
                                        <th class="col-sm-2">Prices</th>

                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody class="alert-warning" id="show_food"></tbody>
                                </table>
                                  </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="panel-default">
                        <div class="panel-heading"><div id="show_add_food"><span class="glyphicon glyphicon-plus-sign"></span> Adding Food</div></div>

                        <div class="panel-body" "show_add_food_form">
                            <?php if(isset($_SESSION['food_add'])) ?> <?php echo $_SESSION['food_add'] ?> <?php unset($_SESSION['food_add']) ?>
                            <form action="../add_food" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name *">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Prices *">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select name="food_menu_id" id="food_menu_id" class="form-control">
                                    <option value="0">--Choose Category--</option>
                                        <?php $menus=mysql_query("SELECT * FROM food_menu");
                                            while($menu=mysql_fetch_assoc($menus)): ?>

                                        <option value="<?php echo $menu['id'] ?>"><?php echo $menu['name']?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-3">
                                    <input type="file" name="cover" id="cover">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block" id="add_food"><span class="glyphicon glyphicon-plus-sign"></span> Add Now</span></button>
                                </div>
                            </div>
                                </form>
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