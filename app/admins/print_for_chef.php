<?php
session_start();
include("../../confs/auth.php");
include("../../confs/config.php");
$id=$_GET['id'];
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
    <link href="../bootstrap/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/main.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-default">
                <div class="panel-heading">Restaurant Cooking </div>
                <div class="panel-body">
                    <ul class="print-order">
                        <?php
                        include("../../confs/auth.php");
                        include("../../confs/config.php");

                        $orders=mysql_query("SELECT * FROM orders where id=$id");
                        while($order = mysql_fetch_assoc($orders)): ?>
                            <li class="delivered">
                                <div class="table-responsive">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <div class="items">
                                                <thead class="alert-info"><tr>
                                                    <td>Foods Name</td>
                                                    <td>Quantity</td>
                                                    </tr></thead>

                                                <?php
                                                $order_id = $order['id'];
                                                $prices=0;
                                                $items = mysql_query("SELECT orders_item.*, foods.name,price FROM orders_item LEFT JOIN foods ON orders_item.food_id = foods.id WHERE orders_item.order_id = $order_id") or die(mysql_error());
                                                while($item = mysql_fetch_assoc($items)):
                                                    $prices=$item['qty']*$item['price'];
                                                    $totalprices+=$prices;
                                                    ?>
                                                    <tbody class="alert-warning"><tr>
                                                        <td><?php echo $item['name'] ?></td>
                                                        <td><?php echo $item['qty'] ?></td>

                                                    </tr></tbody>

                                                <?php endwhile; ?>

                                            </div>
                                    </div>
                                    </table>
                                    <div class="col-sm-1 alert-warning">C-<?php echo $order['customer'] ?></div>
                                    <div class="col-sm-1 alert-success"><?php echo $order['o_f'] ?> F</div>
                                    <div class="col-sm-3 alert-warning"><?php $t=time(); echo date("d-m-Y H:i:s", time()); ?></div>

                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>



    <div class="panel panel-footer">Developed by Khinewin<br>&copy; <?php echo date("Y") ?></div>
</div>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
</body>
</html>
