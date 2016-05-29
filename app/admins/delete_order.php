<?php
include ("../../confs/auth.php");
include ("../../confs/config.php");

$id=$_POST['id'];
$order_id=$id;

mysql_query("DELETE FROM orders WHERE id=$id");

mysql_query("DELETE FROM orders_item WHERE order_id=$order_id");

?>