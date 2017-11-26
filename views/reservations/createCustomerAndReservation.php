<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \app\models\Room;
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="model">
        
        <?php echo $form->errorSummary([$customer, $reservation]); ?>

        <h2>Customer</h2>        
        <?= $form->field($customer, "name")->textInput() ?>
        <?= $form->field($customer, "surname")->textInput() ?>
        <?= $form->field($customer, "phone_number")->textInput() ?>

        <h2>Reservation</h2>        
        <?= $form->field($reservation, "room_id")->dropDownList(ArrayHelper::map(Room::find()->all(), 'id', function($room, $defaultValue) {
            return sprintf('Room n.%d at floor %d', $room->room_number, $room->floor);
        })); ?>
        <?= $form->field($reservation, "price_per_day")->textInput() ?>
        <?= $form->field($reservation, "date_from")->textInput() ?>
        <?= $form->field($reservation, "date_to")->textInput() ?>
        
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save customer and room', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>