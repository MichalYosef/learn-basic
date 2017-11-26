<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['id' => 'room-form']) ?>
<?php echo $form->field($model, 'floor')->textInput(); ?>
<?php echo $form->field($model, 'room_number')->textInput(); ?>
<?php echo $form->field($model, 'has_conditioner')->checkbox(); ?>
<?php echo $form->field($model, 'has_tv')->checkbox(); ?>
<?php echo $form->field($model, 'has_phone')->checkbox(); ?>
<?php echo $form->field($model, 'available_from')->textInput(); ?>
<?php echo $form->field($model, 'price_per_day')->textInput(); ?>
<?php echo $form->field($model, 'description')->textArea(); ?>
<?php echo Html::submitButton('Create', ['class' => 'btn btnprimary']);
?>
<?php ActiveForm::end() ?>