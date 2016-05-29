<?php
session_start();
include("../../confs/auth.php");
include("../../confs/config.php");
?>
<?php
$tableName="orders";
$targetpage = "..";
$limit = 1000;

$query = "SELECT COUNT(*) as num FROM $tableName";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];

$stages = 3;
$page = mysql_escape_string($_GET['page']);
if($page){
    $start = ($page - 1) * $limit;
}else{
    $start = 0;
} ?>


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
<?php include ("../../menu/in-menu.php"); ?>
<div id="wrapper">
    <?php include("../../menu/in-up-menu.php"); ?>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Orders History <?php if(isset($_GET['d'])){ $d=$_GET['d']; echo "For $d"; } elseif(isset($_GET['m'])){ $m=$_GET['m']; echo "For $m"; } ?>
                        <form method="get" action="../order_history" class="search_history">
                            <input type="text" name="d" placeholder="Search By Date">
                            <button class="s" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                        <form method="get" action="../order_history" class="search_history">
                            <input type="text" name="m" placeholder="Search By Month">
                            <button class="s" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                        
                    </div>
                    <div class="panel-body">
                    <ul class="orders">

                        <?php
                        if(isset($_GET['m']))
                        {
                            $m=$_GET['m'];
                            $orders=mysql_query("SELECT * FROM orders WHERE s_o_m='$m'");
                        }

                        else if(isset($_GET['d']))
                        {
                            $d=$_GET['d'];
                            $orders=mysql_query("SELECT * FROM orders WHERE updated_at='$d'");

                        }
                        else
                        {

                            $orders = mysql_query("SELECT * FROM orders ORDER BY id DESC LIMIT $start, $limit");
                        }

                        while($order = mysql_fetch_assoc($orders)): ?>
                            <li class="delivered">
                                <div class="table-responsive">
                                    <div class="order">
                                        <table class="table">
                                            <tbody class="alert-warning">
                                            <tr>
                                                <td><b>Sales Operator </b></td><td><b><?php echo $order['user'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Customer </td><td>C - <?php echo $order['customer'] ?></td>
                                            </tr>
                                            <tr><td>Order F</td><td><?php echo $order['o_f'] ?> F</td></tr>
                                            <tr>
                                                <td><i>Ordered Date/Time </i></td><td><i> <?php echo $order['created_at'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td><button  class="btn btn-block btn-sm btn-warning"> Delivered</button></td><td  align="center"><b>" <?php if($order['d_status']==0){echo 'No'; }else{ echo 'Finish'; } ?> "</b></td>
                                            </tr>
                                            <tr>
                                                <td><button  class="btn btn-block btn-sm btn-success">Cashed</button></td><td  align="center"><b>" <?php if($order['c_status']==0) {echo 'No';} else {echo 'Finish';} ?> "</b></td>
                                            </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <div class="items">
                                                <thead class="alert-info"><tr>
                                                    <td>Foods Name</td>
                                                    <td>Quantity</td>
                                                    <td>Unique Prices</td>
                                                    <td>Prices</td>
                                                </tr></thead>

                                                <?php
                                                $order_id = $order['id'];
                                                $prices=0;
                                                $totalprices=0;
                                                $items = mysql_query("SELECT orders_item.*, foods.name,price FROM orders_item LEFT JOIN foods ON orders_item.food_id = foods.id WHERE orders_item.order_id = $order_id") or die(mysql_error());
                                                while($item = mysql_fetch_assoc($items)):
                                                    $prices=$item['qty']*$item['price'];
                                                    $totalprices+=$prices;
                                                    $all+=$prices;
                                                    ?>
                                                    <tbody class="alert-warning"><tr>
                                                        <td><?php echo $item['name'] ?></td>
                                                        <td><?php echo $item['qty'] ?></td>
                                                        <td><?php echo $item['price'] ?> Ks.</td>
                                                        <td><?php echo $prices ?> Ks</td>
                                                    </tr></tbody>

                                                <?php endwhile; ?>
                                                <tr class="alert-success">

                                                    <td colspan="3" align="center" >Total Prices</td>
                                                    <td><?php echo $totalprices ?> Ks.</td>
                                                </tr>
                                            </div>
                                    </div>
                                    </table>
                                    <?php if($order['c_status']==1) {
                                        $id=$order['id'];
                                        echo"<a href='../p/$id' target='_blank' class='btn btn-primary btn-sm' ><span class='glyphicon glyphicon-print'></span> Print for Cashed</a>"; }
                                    else
                                    {
                                        $id=$order['id'];
                                        echo"<a href='../p_f_c/$id' target='_blank' class='btn btn-warning btn-sm' ><span class='glyphicon glyphicon-print'></span> Print for Chef</a>";
                                    }
                                    ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        <table class="table">

                            <tr><td class="alert-success" align="center">Total All Cashed</td><td class="alert-warning"><?php echo $all ?>  Ks.</td></tr>
                        </table>


                    </ul>


                        <?php
                        // Initial page num setup
                        if ($page == 0){$page = 1;}
                        $prev = $page - 1;
                        $next = $page + 1;
                        $lastpage = ceil($total_pages/$limit);
                        $LastPagem1 = $lastpage - 1;

                        $paginate = '';
                        if($lastpage > 1)
                        {

                            $paginate .= "<div class='paginate'>";
                            // Previous
                            if ($page > 1){
                                $paginate.= "<a href='$targetpage/order_history/page$prev'><span class='glyphicon glyphicon-backward'></span> prev</a>";
                            }else{
                                $paginate.= "<span class='disabled'><span class='glyphicon glyphicon-backward'></span> prev</span>"; }

                            // Pages
                            if ($lastpage < 7 + ($stages * 2)) // Not enough pages to breaking it up
                            {
                                for ($counter = 1; $counter <= $lastpage; $counter++)
                                {
                                    if ($counter == $page){
                                        $paginate.= "<span class='current'>$counter</span>";
                                    }else{
                                        $paginate.= "<a href='$targetpage/order_history/page$counter'>$counter</a>";}
                                }
                            }
                            elseif($lastpage > 5 + ($stages * 2)) // Enough pages to hide a few?
                            {
                                // Beginning only hide later pages
                                if($page < 1 + ($stages * 2))
                                {
                                    for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
                                    {
                                        if ($counter == $page){
                                            $paginate.= "<span class='current'>$counter</span>";
                                        }else{
                                            $paginate.= "<a href='$targetpage/order_history/page$counter'>$counter</a>";}
                                    }
                                    $paginate.= "...";
                                    $paginate.= "<a href='$targetpage/order_history/page$LastPagem1'>$LastPagem1</a>";
                                    $paginate.= "<a href='$targetpage/order_history/page$lastpage'>$lastpage</a>";
                                }
                                // Middle hide some front and some back
                                elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
                                {
                                    $paginate.= "<a href='$targetpage/order_history/page1'>1</a>";
                                    $paginate.= "<a href='$targetpage/order_history/page2'>2</a>";
                                    $paginate.= "...";
                                    for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
                                    {
                                        if ($counter == $page){
                                            $paginate.= "<span class='current'>$counter</span>";
                                        }else{
                                            $paginate.= "<a href='$targetpage/order_history/page$counter'>$counter</a>";}
                                    }
                                    $paginate.= "...";
                                    $paginate.= "<a href='$targetpage/order_history/page$LastPagem1'>$LastPagem1</a>";
                                    $paginate.= "<a href='$targetpage/order_history/page/$lastpage'>$lastpage</a>";
                                }
                                // End only hide early pages
                                else
                                {
                                    $paginate.= "<a href='$targetpage/order_history/page1'>1</a>";
                                    $paginate.= "<a href='$targetpage/order_history/page2'>2</a>";
                                    $paginate.= "...";
                                    for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
                                    {
                                        if ($counter == $page){
                                            $paginate.= "<span class='current'>$counter</span>";
                                        }else{
                                            $paginate.= "<a href='$targetpage/order_history/page$counter'>$counter</a>";}
                                    }
                                }
                            }

                            // Next
                            if ($page < $counter - 1){
                                $paginate.= "<a href='$targetpage/order_history/page$next'><span class='glyphicon glyphicon-forward'></span> next</a>";
                            }else{
                                $paginate.= "<span class='disabled'><span class='glyphicon glyphicon-forward'></span> next</span>";
                            }

                            $paginate.= "</div>";

                        }
                        // result for all item $total_pages.' Results';
                        // pagination
                        echo $paginate;
                        ?>




                    </div>
                </div>

            </div>
        </div>
    </div>

</div>




<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
</body>
</html>