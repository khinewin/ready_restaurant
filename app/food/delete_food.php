<?php

include("../../confs/auth.php");
include("../../confs/config.php");

$id=$_POST['id'];

$sql=mysql_query("DELETE FROM foods where id=$id");

if($sql)
{
    echo '<ul class="alert-danger"><span class="glyphicon glyphicon-thumbs-up"></span> Food have been delete successfully *</ul>';
}
?>