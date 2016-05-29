<?php
session_start();
include("../../confs/stuff_auth.php");
include("../../confs/config.php");
$id=$_GET['id'];
$email=$_SESSION['email'];
$users=mysql_query("SELECT * FROM users where id='$id'");
$user=mysql_fetch_assoc($users);
$db_email=$user['email'];
if($email==$db_email)
{
    $result=mysql_query("SELECT * FROM users where id='$id'");
}
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
                <div class="col-md-2">
                    <a href="../" class="btn btn-block btn-sm btn-success"><span class="glyphicon glyphicon-backward"></span> Continued to order</a>

                    <button class="btn btn-block btn-danger btn-sm" id="clear_cart"><span class="glyphicon glyphicon-remove-circle"></span> Clear Orders</button>
                </div>
                <div class="col-md-10">
                    <div class="panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Orders in cart </div>
                        <div class="panel-body">
                            <div id="msg_clear_cart"></div><div id="msg_submit_order"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="alert-info">
                                        <th>Foods Name</th>
                                        <th>Quantity</th>
                                        <th>Unique Prices</th>
                                        <th>Prices</th>
                                    </tr>
                                    <tbody id="show_order_in_cart"></tbody>

                                </table>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                            <select name="customer" id="customer" class="form-control">
                                <option value="101">C 101</option>
                                <option value="102">C 102</option>
                                <option value="103">C 103</option>
                                <option value="104">C 104</option>
                                <option value="105">C 105</option>
                                <option value="106">C 106</option>
                            </select>
                                    </div>

                                <div class="col-sm-6">
                                    <select name="o_f" id="o_f" class="form-control">
                                        <option value="1">First Order</option>
                                        <option value="N">Next Order</option>
                                    </select>
                                </div>
                            </div>
                            <button id="submit_order" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-ok-circle"></span> Submit Ordered</button>

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