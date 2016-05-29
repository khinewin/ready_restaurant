<?php
include("../../confs/auth.php");
include("../../confs/config.php");

$id=$_POST['id'];
$result=mysql_query("SELECT * FROM orders where id=$id");
$row=mysql_fetch_assoc($result);

$d_status=$row['d_status'];
$c_status=$row['c_status'];



if($d_status==0)
{
    mysql_query("UPDATE orders SET d_status='1' WHERE id=$id");
}
else
{
    if($c_status==0)
    {
        mysql_query("UPDATE orders SET d_status='0' WHERE id=$id");
    }

}
?>
