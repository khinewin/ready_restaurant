<?php
include("../../confs/auth.php");
include("../../confs/config.php");

$id=$_POST['id'];
$c_pass=$_POST['c_password'];
$pass=$_POST['password'];
$pass_confirm=$_POST['password_confirm'];

if($c_pass)
{
    if($pass)
    {
        if($pass_confirm)
        {
            $result=mysql_query("SELECT * FROM users where id=$id");
            $row=mysql_fetch_assoc($result);
            $db_pass=$row['password'];
            $h_c_pass=md5($c_pass);
            if($db_pass==$h_c_pass)
            {
                if($pass==$pass_confirm)
                {
                    $h_pass=md5($pass);
                    if($db_pass!=$h_pass)
                    {
                        $h_pass=md5($pass);
                        mysql_query("UPDATE users SET password='$h_pass', updated_at=now() where id=$id");
                        echo'<ul class="alert-success"><span class="glyphicon glyphicon-thumbs-up"></span>  Password was successfully updated *</ul>';


                    }
                    else
                    {
                        echo'<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span> New password must not same current password *</ul>';
                    }
                }
                else
                {
                    echo'<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  New password was not confirm *</ul>';
                }

            }
            else
            {
                echo'<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Current password was incorrect *</ul>';
            }

        }
        else
        {
            echo'<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Enter confirm new password *</ul>';
        }

    }
    else
    {
        echo'<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Enter new password *</ul>';
    }

}
else
{
    echo'<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Enter current password *</ul>';
}