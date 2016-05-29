<?php
include("../../confs/auth.php");
include("../../confs/config.php");
?>

<?php
$to_day=date("Y-m-d");

$orders=mysql_query("SELECT * FROM orders WHERE updated_at='$to_day' ORDER BY id DESC");
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
                        <td><button id="<?php echo $order['id'] ?>" class="do_delivered btn btn-block btn-sm btn-warning"> Delivered</button></td><td  align="center"><b>" <?php if($order['d_status']==0){echo 'No'; }else{ echo 'Finish'; } ?> "</b></td>
                    </tr>
                    <tr>
                        <td><button id="<?php echo $order['id'] ?>" class="do_cashed btn btn-block btn-sm btn-success">Cashed</button></td><td  align="center"><b>" <?php if($order['c_status']==0) {echo 'No';} else {echo 'Finish';} ?> "</b></td>
                    </tr>
                    <tr>
                        <td><button id="<?php echo $order['id'] ?>" class="delete_order btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></button></td>
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
                        $total_prices=0;
                        $items = mysql_query("SELECT orders_item.*, foods.name,price FROM orders_item LEFT JOIN foods ON orders_item.food_id = foods.id WHERE orders_item.order_id = $order_id") or die(mysql_error());
                        while($item = mysql_fetch_assoc($items)):
                            $prices=$item['qty']*$item['price'];
                            $total_prices+=$prices;
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
                            <td><?php echo $total_prices ?> Ks.</td>
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

    <tr><td class="alert-success" align="center">Total All Cashed To day</td><td class="alert-warning"><?php echo $all ?>  Ks.</td></tr>
</table>
