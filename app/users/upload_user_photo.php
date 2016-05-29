<?php
include("../../confs/stuff_auth.php");
include("../../confs/config.php");

$id=$_POST['id'];
$cover=$_FILES['cover']['name'];
$tmp=$_FILES['cover']['tmp_name'];

if($cover)
{
    move_uploaded_file($tmp, "covers/$cover");
    mysql_query("UPDATE users SET cover='$cover' where id=$id");
    header("location: ../user/$id");

}

else
{
    header("location: ../user/$id");
}

?>
