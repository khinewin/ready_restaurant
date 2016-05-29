<?php
include("../../confs/auth.php");
include("../../confs/config.php");

$name=$_POST['name'];
$price=$_POST['price'];
$food_menu_id=$_POST['food_menu_id'];
$cover=$_FILES['cover']['name'];
$tmp=$_FILES['cover']['tmp_name'];


if($cover)
{
    move_uploaded_file($tmp, "covers/$cover");
}

if($name)
{
    if($price)
    {
        if($food_menu_id!=0)
        {
            if($cover)
            {
               $sql=mysql_query("INSERT INTO foods (name, price, food_menu_id, cover) VALUES ('$name', '$price', '$food_menu_id', '$cover') ");
                    if($sql)
                    {
                        $_SESSION['food_add']='<ul class="alert-success"><span class="glyphicon glyphicon-thumbs-up"></span>  Adding food successfully *</ul>';
                        header("location: foods");
                    }
            }
            else
            {
                $_SESSION['food_add']='<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Please upload acover photo of food *</ul>';
                header("location: foods");
            }

        }
        else
        {
            $_SESSION['food_add']='<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Please choose category for food *</ul>';
            header("location: foods");
        }

    }
    else
    {
        $_SESSION['food_add']='<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Please enter prices of food *</ul>';
        header("location: foods");
    }

}
else
{
    $_SESSION['food_add']= '<ul class="alert-danger"><span class="glyphicon glyphicon-alert"></span>  Please enter a name of food *</ul>';
        header("location: foods");
}