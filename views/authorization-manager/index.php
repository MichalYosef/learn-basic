<?php
use yii\helpers\Html;
?>

<table class="table">
    <tr>
        <td>User</td>
        <?php foreach($rolesAvailable as $r) { ?>
            <td><?php echo $r->description ?></td>
        <?php } ?>
    </tr>
    
    <?php foreach($users as $u) { ?>
        <tr>
            <td><?php echo $u->username ?></td>
            
            <?php foreach($rolesAvailable as $r) { ?>
                <td align="center">
                <?php if(in_array($r->name, $rolesNamesByUser[$u->id])) { ?>
                    <?php echo Html::a('Yes', ['remove-role', 'userId' => $u->id, 'roleName' => $r->name]); ?>
                <?php } else { ?>
                    <?php echo Html::a('No', ['add-role', 'userId' => $u->id, 'roleName' => $r->name]); ?>
                <?php } ?> 
                </td>
            <?php } ?>            
        </tr>
    <?php } ?>
    
</table>