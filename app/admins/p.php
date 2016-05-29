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
</head>
<body>


<?php $id=$_GET['id']; ?>

<div class="container">
    <div class="row">
        <div class="panel-default">

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <iframe src="../print/<?php echo $id ?>" name="frame" width="1100px" height="500px"></iframe>
                        <div>

                            <button class=" btn btn-primary"onclick="frames['frame'].print()" ><span class="glyphicon glyphicon-print"></span> Print Now</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
</body>
</html>
