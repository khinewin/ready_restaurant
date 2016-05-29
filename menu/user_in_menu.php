<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <ul class="sidebar-brand">
                <?php
                $email=$_SESSION['email'];
                $users=mysql_query("SELECT * FROM users where email='$email'");
                $user=mysql_fetch_assoc($users);
                $id=$user['id'];
                $fName=$user['fName'];
                $lName=$user['lName'];
                $cover=$user['cover'];
                echo "<a href='../user/$id'><img src='../users/covers/$cover' width='70px' height='70px' class='img-circle'> ";
                echo" $fName $lName</a>";
                ?>
            </ul>
            <li class="sidebar-brand">
                <a href="../">
                    <span class="glyphicon glyphicon-certificate"></span> Restaurant
                </a>
            </li>
            <li>
                <a href="../user_home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <li>
                <a href="../orderes_in_cart"><span class="glyphicon glyphicon-shopping-cart"></span> Orders In Cart</a>
            </li>

            <li>
                <a href="../logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
</div>
