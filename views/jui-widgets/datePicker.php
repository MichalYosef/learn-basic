<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


?>

<div class="row">
    <div class="col-lg-6">
        <h3>Date Picker from Value<br />(using MM/dd/yyyy format and english language)</h3>
        <?php
            $value = date('Y-m-d');
            
        echo DatePicker::widget([
            'name'  => 'from_date',
            'value'  => $value,
            'language' => 'en',
            'dateFormat' => 'MM/dd/yyyy',
        ]);
        ?>
    </div>
    <div class="col-lg-6">
        
        <?php if($reservationUpdated) { ?>
            <?php 
            echo yii\bootstrap\Alert::widget([
                'options' => [
                    'class' => 'alert-success',
                ],
                'body' => 'Reservation successfully updated',
            ]);   
            ?>         
        <?php } ?>
        
        <?php $form = ActiveForm::begin(); ?>
        
        <h3>Date Picker from Model<br />(using dd/MM/yyyy format and italian language)</h3>
        
        <br />
        
        <label>Date from</label>
        <?php
        // First implementation of DatePicker Widget
        echo DatePicker::widget([
            'model'  => $reservation,
            'attribute' => 'date_from',
            'language' => 'it',
            'dateFormat' => 'dd/MM/yyyy',
        ]);
        ?>
   
        <br />
        <br />
        
        <?php
        // Second implementation of DatePicker Widget
        echo $form->field($reservation, 'date_to')->widget(\yii\jui\DatePicker::classname(), [
                'language' => 'it',
                'dateFormat' => 'dd/MM/yyyy',
        ]) ?>        
        
        <?php     
            echo Html::submitButton('Send', ['class' => 'btn btn-primary']) 
        ?>

        <?php $form = ActiveForm::end(); ?>
        
    </div>
</div>