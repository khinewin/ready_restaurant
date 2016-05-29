<?php
include("../../confs/auth.php");
include("../../confs/config.php");

$id=$_POST['id'];
$result=mysql_query("SELECT * FROM orders where id=$id");
$row=mysql_fetch_assoc($result);

$c_status=$row['c_status'];
$d_status=$row['d_status'];
if($d_status==1)
{

    if($c_status==0)
    {
        mysql_query("UPDATE orders SET c_status='1', updated_at=now() WHERE id=$id");
    }
    else
    {
        mysql_query("UPDATE orders SET c_status='0' WHERE id=$id");
    }
}

?>
