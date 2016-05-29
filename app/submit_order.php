<?php
session_start();
include("../confs/stuff_auth.php");
include("../confs/config.php");
$email=$_SESSION['email'];
$customer=$_POST['customer'];
$o_f=$_POST['o_f'];
$s_o_m=date("Y-m");

mysql_query("INSERT INTO orders (user, d_status, c_status, customer, o_f, created_at, updated_at, s_o_m) VALUES ('$email','0', '0','$customer', '$o_f', now(), now(), '$s_o_m')");

$order_id=mysql_insert_id();

foreach($_SESSION['cart'] as $id=>$qty)
{
mysql_query("INSERT INTO orders_item(order_id, food_id, qty) VALUES ('$order_id', '$id', '$qty')");
}
unset($_SESSION['cart']);
echo'<ul class="alert-success"><span class="glyphicon glyphicon-thumb-up"></span>  Ordered have been submitted *</ul>';



?>