<?php session_start(); ?>
<nav class="navbar navbar-inverse  role="navigation">

<div class="navbar-header page-scroll">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand page-scroll" href="/"><span class="glyphicon glyphicon-certificate"></span> Restaurant</a>


</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">


        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
        <li class="hidden">
            <a class="page-scroll" href="#page-top"></a>
        </li>


    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li><form action="../" method="get" class="search">
                <input type="text" name="q" placeholder="Search by ID">
                <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </form></li>

        <li id="show_cart"></li>

        <?php
        $email=$_SESSION['email'];
        $users=mysql_query("SELECT * FROM users where email='$email'");
        $user=mysql_fetch_assoc($users);
        $id=$user['id'];
        $fName=$user['fName'];
        $lName=$user['lName'];
        $cover=$user['cover'];


        echo"<li><a href='../user_home'><span class='glyphicon glyphicon-dashboard'></span> Dashboard </a></li>";
        echo"<li class='dropdown'>
            <a href='../user/$id' data-toggle='dropdown' class='dropdown-toggle'><img src='../users/covers/$cover' width='20px' height='20px' class='img-circle'> $fName $lName<b class='caret'></b></a>

        <ul class='dropdown-menu submenu'>
            <li><a href='../user/$id'><span class='glyphicon glyphicon-user'></span> Profile</a></li>
            <li><a href='../logout'><span class='glyphicon glyphicon-log-out'></span> Logout </a></li>";
        ?>


    </ul>
</div>
<!-- /.navbar-collapse -->

</nav>
