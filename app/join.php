<?php
session_start();
include("confs/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/main.js"></script>
</head>
<body>

<?php
if($_SESSION['auth']==true)
{
    include "../menu/admin_menu.php";
}
elseif($_SESSION['stuff_auth'])
{
    include("../menu/stuff-menu.php");
}
else
{
    include("../menu/normal_menu.php");
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
        <div class="panel panel-heading">
          Register
        </div>
            <div id="msg_signup"></div>
            <div class="panel panel-body">
                <div class="form-group">
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="fName" id="fName" placeholder="First Name *">
                    </div>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lName" id="lName" placeholder="Last Name *">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email *">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password *">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password *">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control" name="urole" id="urole">
                            <option>--Choose User Role--</option>
                            <option value="1">Admin</option>
                            <option value="0">Stuff</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-block" id="signup"><span class="glyphicon glyphicon-registration-mark"></span> Sign Up</button>
                    </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                        <form action="signin">
                            <button class="btn btn-success form-control" ><span class="glyphicon glyphicon-log-in"></span> Login</a></button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
       </div>
</div>





<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <div class="panel panel-footer">Developed by Khinewin<br>&copy; <?php echo date("Y") ?></div>
</body>
</html>
