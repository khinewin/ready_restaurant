<?php
session_start();
$show_cart=0;
if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $qty)
    {
        $show_cart+=$qty;
    }
}
?>

<a href="orderes_in_cart"><span class="glyphicon glyphicon-shopping-cart"></span> Your order have (<?php echo $show_cart ?>) items </a>
