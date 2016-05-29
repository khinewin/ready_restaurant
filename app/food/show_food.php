<?php
include("../../confs/auth.php");
include("../../confs/config.php");

$result=mysql_query("SELECT * FROM foods");
while($row=mysql_fetch_assoc($result)): ?>

<tr>
    <td><img src="../food/covers/<?php echo $row['cover'] ?>" width="50px" height="50px" class="img-thumbnail"> </td>
    <td><?php echo $row['name'] ?></td>
    <td>
    <?php $cats=mysql_query("SELECT * FROM food_menu");
    while($cat=mysql_fetch_assoc($cats)): ?><?php if($row['food_menu_id']==$cat['id']) echo $cat['name']; ?><?php endwhile; ?>
    </td>
    <td><?php echo $row['price'] ?> Ks.</td>
    <td><button class="btn btn-danger btn-sm delete_food" id="<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-remove"></span></span></button></td>
</tr>


<?php endwhile; ?>
