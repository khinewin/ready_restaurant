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
                echo "<a href='../admin/$id'><img src='../admins/covers/$cover' width='70px' height='70px' class='img-circle'> ";
                echo" $fName $lName</a>";
                ?>
            </ul>
            <li class="sidebar-brand">
                <a href="../">
                   <span class="glyphicon glyphicon-certificate"></span> Restaurant
                </a>
            </li>
            <li>
                <a href="../home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>

            <li>
                <a href="../foods"><span class="glyphicon glyphicon-leaf"></span> Foods</a>
            </li>
            <li>
                <a href="../food_menu"><span class="glyphicon glyphicon-list"></span> Food Menu</a>
            </li>
            <li>
                <a href="../orders"><span class="glyphicon glyphicon-shopping-cart"></span> Orders</a>
            </li>
            <li>
                <a href="../order_history"><span class="glyphicon glyphicon-shopping-cart"></span> Orders History</a>
            </li>
           
            <li>
                <a href="../logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
</div>
