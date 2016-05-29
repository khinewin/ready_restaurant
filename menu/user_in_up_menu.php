<?php session_start(); ?>


<nav class="navbar navbar-default  role="navigation">

<div class="navbar-header page-scroll">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="#menu-toggle" id="menu-toggle" class=navbar-brand page-scroll"><span class="glyphicon glyphicon-list"></span> Sidebar Menu</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
        <li><a href='../user_home'><span class='glyphicon glyphicon-dashboard'></span> Dashboard </a></li>

        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
        <li class="hidden">
            <a class="page-scroll" href="#page-top"></a>
        </li>


    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="../orderes_in_cart"><span class="glyphicon glyphicon-shopping-cart"></span> Orders In Cart</a>
        </li>
        <?php
        $email=$_SESSION['email'];
        $users=mysql_query("SELECT * FROM users where email='$email'");
        $user=mysql_fetch_assoc($users);
        $id=$user['id'];
        $fName=$user['fName'];
        $lName=$user['lName'];
        ?>

        <li class="dropdown">
            <a href="../user/<?php echo $id ?>" data-toggle="dropdown" class="dropdown-toggle"><img src="../users/covers/<?php echo $cover ?>" width="20px" height="20px" class="img-circle"> <?php echo  $fName; ?> <?php echo $lName ?> <b class="caret"></b></a>

            <ul class="dropdown-menu submenu2">
                <li><a href='../user/<?php echo $id ?>'><span class='glyphicon glyphicon-user'></span> Profile</a></li>
                <li><a href="../logout"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>


            </ul>
</div>
<!-- /.navbar-collapse -->

</nav>
