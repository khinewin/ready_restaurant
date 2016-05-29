<?php
session_start();
include ("../../confs/stuff_auth.php");
include("../../confs/config.php");

$id=$_POST['id'];
$email=$_SESSION['email'];
$users=mysql_query("SELECT * FROM users where id='$id'");
$user=mysql_fetch_assoc($users);
$db_email=$user['email'];

if($email==$db_email) {

    $sql = mysql_query("DELETE FROM users WHERE id=$id");

    if ($sql) {
        echo "delete";
        unset($_SESSION['stuff_auth']);

    } else {
        echo "delete account failed";
    }
}
else
{
    unset($_SESSION['auth']);
}
?>