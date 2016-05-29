<?php
include("../../confs/auth.php");
include ("../../confs/config.php");

$id=$_POST['id'];

$sql=mysql_query("DELETE FROM food_menu WHERE id=$id");

if($sql)
{
    echo '<ul class="alert-danger"><span class="glyphicon glyphicon-thumbs-up"></span> Food menu have been delete successfully *</ul>';
}
?>