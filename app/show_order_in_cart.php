<?php
session_start();
include("../confs/config.php");
include("../confs/stuff_auth.php");
$total=0;
foreach($_SESSION['cart'] as $id =>$qty):
    $result=mysql_query("SELECT * FROM foods where id=$id");
    $row=mysql_fetch_assoc($result);
    $prices=$qty*$row['price'];
    $total+=$prices;

    ?>
    <tr class="alert-warning">
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $qty ?> </td>
        <td><?php echo $row['price'] ?> Ks.</td>
        <td><?php echo $prices ?> Ks.</td>
    </tr>
<?php endforeach; ?>
<tr class="alert-success">
    <td colspan="3">Total Prices</td>
    <td><?php echo $total ?> Ks.</td>

</tr>



