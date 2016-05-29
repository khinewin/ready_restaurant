<?php
session_start();
include("../confs/config.php");

?>
<?php
$tableName="foods";
$targetpage = "..";
$limit = 15;

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


<?php
if(isset($_GET['category'])) {
    $cat_id = $_GET['category'];
    $foods = mysql_query("SELECT * FROM $tableName WHERE food_menu_id=$cat_id");

}
else
{
// Get page data
    $foods = mysql_query("SELECT * FROM $tableName LIMIT $start, $limit");

}
if(isset($_GET['q']))
{
    $cat_id=$_GET['q'];
    $foods=mysql_query("SELECT * FROM $tableName where id=$cat_id");
}

$cats=mysql_query("SELECT * FROM food_menu");
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
    <link href="../bootstrap/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/main.js"></script>

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
    <div class="col-md-12">
        <div class="panel-default">


<nav class="navbar navbar-inverse  role="navigation">
<div class="navbar-header page-scroll">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

<a class="navbar-brand page-scroll" href="/"><span class="glyphicon glyphicon-leaf"></span> All Foods</a>

</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex2-collapse">
    <ul class="nav navbar-nav">

    <?php while($cat=mysql_fetch_assoc($cats)): ?>
            <li><a href="../category<?php echo $cat['id']?>"><span class="glyphicon glyphicon-list"></span> <?php echo $cat['name'] ?></a></li>
        <?php endwhile; ?>
        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
        <li class="hidden">
            <a class="page-scroll" href="#page-top"></a>
        </li>


    </ul>
    <ul class="nav navbar-nav navbar-right">

    </ul>
</div>
<!-- /.navbar-collapse -->

</nav>

            <div class="panel-body">
                <ul class="main_show">
                <?php while ($row=mysql_fetch_assoc($foods)): ?>

                    <li>
                        <i>ID-<?php echo $row['id'] ?></i>
                        <br>
                        <img src="../food/covers/<?php echo $row['cover'] ?>" width="60px" height="60px" class="img-circle">
                        <br>
                        <i><?php echo $row['price'] ?> Ks.</i>
                        <br>
                        <b><?php echo $row['name'] ?></b>
                        <br>
                       <?php if($_SESSION['stuff_auth'])
                        {
                          $id=$row['id'];
                         echo"<button class='btn btn-warning btn-sm add_to_cart' id = $id ><span class='glyphicon glyphicon-shopping-cart' ></span > Add to cart </button >";
                        }
                       ?>
                           </li>
                <?php endwhile; ?>
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
                    $paginate.= "<a href='$targetpage/page$prev'><span class='glyphicon glyphicon-backward'></span> prev</a>";
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
                    $paginate.= "<a href='$targetpage/page$counter'>$counter</a>";}
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
                    $paginate.= "<a href='$targetpage/page$counter'>$counter</a>";}
                    }
                    $paginate.= "...";
                    $paginate.= "<a href='$targetpage/page$LastPagem1'>$LastPagem1</a>";
                    $paginate.= "<a href='$targetpage/page$lastpage'>$lastpage</a>";
                    }
                    // Middle hide some front and some back
                    elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
                    {
                    $paginate.= "<a href='$targetpage/page1'>1</a>";
                    $paginate.= "<a href='$targetpage/page2'>2</a>";
                    $paginate.= "...";
                    for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
                    {
                    if ($counter == $page){
                    $paginate.= "<span class='current'>$counter</span>";
                    }else{
                    $paginate.= "<a href='$targetpage/page$counter'>$counter</a>";}
                    }
                    $paginate.= "...";
                    $paginate.= "<a href='$targetpage/page$LastPagem1'>$LastPagem1</a>";
                    $paginate.= "<a href='$targetpage/page/$lastpage'>$lastpage</a>";
                    }
                    // End only hide early pages
                    else
                    {
                    $paginate.= "<a href='$targetpage/page1'>1</a>";
                    $paginate.= "<a href='$targetpage/page2'>2</a>";
                    $paginate.= "...";
                    for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
                    {
                    if ($counter == $page){
                    $paginate.= "<span class='current'>$counter</span>";
                    }else{
                    $paginate.= "<a href='$targetpage/page$counter'>$counter</a>";}
                    }
                    }
                    }

                    // Next
                    if ($page < $counter - 1){
                    $paginate.= "<a href='$targetpage/page$next'><span class='glyphicon glyphicon-forward'></span> next</a>";
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






<div class="panel panel-footer">Developed by Khinewin<br>&copy; <?php echo date("Y") ?></div>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
</body>
</html>
