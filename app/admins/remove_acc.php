<?php
session_start();
include ("../../confs/auth.php");
include ("../../confs/config.php");

$id=$_POST['id'];

    $sql = mysql_query("DELETE FROM users WHERE id=$id");

    if ($sql) {
        echo '<ul class="alert-warning"><span class="glyphicon glyphicon-thumbs-up"></span> Remove user account successfully *</ul>';


    } else {
        echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span> Remove user account failed *</ul>';
    }

?>