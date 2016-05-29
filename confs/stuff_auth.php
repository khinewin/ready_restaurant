<?php
session_start();
if(!isset($_SESSION['stuff_auth']))
{
    header("location: ../");
    exit();
}
?>