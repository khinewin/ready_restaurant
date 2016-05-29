<?php
include ("../../confs/auth.php");
include ("../../confs/config.php");

$result=mysql_query("SELECT * FROM users");
while($row=mysql_fetch_assoc($result)) : ?>

<tr>
    <td>
        <?php if($row['urole']==1)
        { $cover=$row['cover'];
            echo "<img src='../admins/covers/$cover' width='40px' class='img-thumbnail'>";}
        else
        { $cover=$row['cover'];
            echo "<img src='../users/covers/$cover' width='40px' class='img-thumbnail'>";}
        ?>
        </td>
    <td><?php echo $row['email'] ?></td>
    <td><?php if($row['urole']==1) {echo 'Administrator'; } else { echo 'Standard User';} ?></td>
    <td><button id="<?php echo $row['id'] ?>" class="remove_acc btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></button></td>
    
</tr>

<?php endwhile; ?>
