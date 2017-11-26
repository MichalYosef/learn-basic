<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReservationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'room_id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'price_per_day') ?>

    <?= $form->field($model, 'date_from') ?>

    <?php // echo $form->field($model, 'date_to') ?>

    <?php // echo $form->field($model, 'reservation_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
