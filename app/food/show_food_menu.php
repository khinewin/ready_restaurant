<?php
include ("../../confs/auth.php");
include ("../../confs/config.php");

$result=mysql_query("SELECT * FROM food_menu");
while($row=mysql_fetch_assoc($result)):
 ?>
<tr>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['remark'] ?></td>
    <td><button class="btn btn-danger btn-sm delete_food_menu" id="<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-remove"></span></span></button></td>
</tr>


<?php endwhile; ?>