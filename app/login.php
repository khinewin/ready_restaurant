<?php
session_start();
include("../confs/config.php");

$email=$_POST['email'];
$pass=$_POST['password'];
$password=md5($pass);

if($email)
{
    if((strstr($email, '@')) && (strstr($email, '.')))
{
    if($pass)
    {
        $result=mysql_query("SELECT * FROM users where email='$email'");
        $row=mysql_fetch_assoc($result);
        $db_email=$row['email'];
        $urole=$row['urole'];
        if($email==$db_email)
        {
            $db_pass=$row['password'];
            if($password==$db_pass)
            {
                if($urole==0)
                {
                    $_SESSION['stuff_auth']=true;
                    $_SESSION['email']=$row['email'];
                    echo "Login";
                }
                elseif($urole==1)
                {
                    $_SESSION['auth']=true;
                    $_SESSION['email']=$row['email'];
                    echo "Login";
                }
                else
                {
                    echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span> Something wrong cannot login *</ul>';
                }
            }
            else
            {
               echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span> Password is not incorrect *</ul>';

            }

        }
        else
        {
            echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span> Email was not found *</ul>';

        }

    }
    else
    {
        echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span> Missing password field *</ul>';

    }

}
    else
    {
        echo'<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span> Invalid email address *</ul>';

    }
}
else
{
    echo'<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Misssing email address field *</ul>';

}


?>