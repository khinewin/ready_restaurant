<?php
include("../confs/config.php");

$fName=$_POST['fName'];
$lName=$_POST['lName'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_confirm=$_POST['password_confirm'];
$urole=$_POST['urole'];



if($fName)
{
    if($lName)
    {
        if($email)
        {
            if((strstr($email, '@')) && (strstr($email, '.')))
            {
                if($password)
                {
                    if($password_confirm)
                    {
                        if($password==$password_confirm)
                        {
                            $result=mysql_query("SELECT * FROM users where email='$email'");
                            $numrows=mysql_num_rows($result);

                            if($numrows>=1)
                            {
                                echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Email have already exit *</ul>';
                            }
                            else
                            {
                                $h_password=md5($password);
                                mysql_query("INSERT INTO users( urole, fName, lName, email, password, cover, created_at, updated_at) VALUES ( '$urole', '$fName','$lName', '$email', '$h_password', '0', now(), now())");
                                echo '<ul class="alert-success"><span class="glyphicon glyphicon-thumbs-up"></span>  Your account have been successfully created *</ul>';
                            }


                        }
                        else
                        {
                            echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Password was not confirm *</ul>';
                        }

                    }
                    else
                    {
                        echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Misssing password confirm field *</ul>';
                    }

                }
                else
                {
                    echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Misssing password field *</ul>';
                }

            }
            else
            {
                echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Please enter avalid email address *</ul>';
            }

        }
        else
        {
            echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Misssing email address field *</ul>';
        }
    }
    else
    {
        echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Misssing last name field *</ul>';
    }

}
else
{
    echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Misssing first name field *</ul>';


}


?>
