<?php
include("../../confs/auth.php");
include("../../confs/config.php");

$name=$_POST['name'];
$remark=$_POST['remark'];

if($name)
{
    if($remark)
    {
        mysql_query("INSERT INTO food_menu (name, remark) VALUES ('$name', '$remark')");
        echo '<ul class="alert-success"><span class="glyphicon glyphicon-thumbs-up"></span> Adding food menu successfully *</ul>';

    }
    else
    {
        echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Please enter remark for food menu *</ul>';
    }

}
else
{
    echo '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Please enter a name for food menu *</ul>';
}