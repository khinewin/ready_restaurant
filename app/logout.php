<?php
session_start();


unset($_SESSION['auth']);
unset($_SESSION['stuff_auth']);
unset($_SESSION['email']);
echo "Logout";
header("location: ../");
?>
