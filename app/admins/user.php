<?php
session_start();
include("../../confs/auth.php");
include("../../confs/config.php");
$id=$_GET['id'];
$email=$_SESSION['email'];
$users=mysql_query("SELECT * FROM users where id='$id'");
$user=mysql_fetch_assoc($users);
$db_email=$user['email'];
if($email==$db_email)
{
    $result=mysql_query("SELECT * FROM users where id='$id'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/simple-sidebar.css" rel="stylesheet">
    <link href="../bootstrap/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/main.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery.form.js"></script>
</head>
<body>
<?php include ("../../menu/in-menu.php"); ?>
<div id="wrapper">
    <?php include("../../menu/in-up-menu.php"); ?>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                        <?php $row=mysql_fetch_assoc($result); ?>
                        <img src="../admins/covers/<?php echo $row['cover'] ?>" width="150px" class="img-thumbnail">
                        <br><br>
                        <form role="form" action="../upload_admin_photo.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?php echo $row['id']?>">
                        <input type="file"  name="cover" id="cover">
                        <br>
                        <input type="submit" id="upload_photo" value="Upload profile picture" class="btn btn-sm btn-primary">
                        </form>
                    <br><br><br>
                </div>
                <div class="col-md-5">
                    <span class="glyphicon glyphicon-modal-window"></span> Account Type : <?php if($row['urole']==0) { echo "Normal User";} else {echo 'Administrator' ;} ?>
                    <br><br><br>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> First Name : <?php echo $row['fName']; ?>
                    <br><br><br>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> Last Name : <?php echo $row['lName']; ?>
                    <br><br><br>
                    <span class="glyphicon glyphicon-user"></span> Username : <?php echo $row['fName']; ?> <?php echo $row['lName'] ?>
                    <br><br><br>
                    <span class="glyphicon glyphicon-envelope"></span> Email : <?php echo $row['email']; ?>
                    <br><br><br>
                    <span class="glyphicon glyphicon-time"></span> Your account was created at : <?php echo $row['created_at'] ?>
                    <br><br><br>
                    <span class="glyphicon glyphicon-lock"></span> Your password was updated at : <?php echo $row['updated_at'] ?>
                     <br><br><br>
                    <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                    <button class="btn btn-danger" id="delete_account"><span class="glyphicon glyphicon-remove-circle" ></span> Delete this account</button>
                    <br><br><br>
           

                </div>
                <div class="col-md-4">

                    <button class="btn btn-block btn-warning" id="change_pass"><span class="glyphicon glyphicon-edit"></span> Change your password</button>
                        <div id="edit_pass" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel-heading"></div>
                                        <div id="msg_pass"></div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                                                <input type="password" class="form-control" name="c_password" id="c_password" placeholder="Current Password *">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="New Password *">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm New Password *">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-primary btn-block" id="update_pass"><span class="glyphicon glyphicon-upload"></span> Updated Now</button>
                                            </div>
                                        </div>

                                    </div>

                        </div> <!-- /dropdown-menu -->

                </div>
            </div>
        </div>
    </div>

</div>




<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
</body>
</html>