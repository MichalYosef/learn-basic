<?php
use \yii\bootstrap\ActiveForm; 
use \yii\helpers\Html;
use \yii\bootstrap\Alert;
?>

<?php 
if($error != null) { 
    echo Alert::widget([ 'options' => [ 'class' => 'alert-danger' ], 'body' => $error ]);    
}
?>

<?php if(Yii::$app->user->isGuest) { ?> 

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   
<?php } else { ?>
    <h2>You are authenticated!</h2>
    <br /><br />
    <?php echo Html::a('Logout',  ['my-authentication/logout'], ['class' => 'btn btn-warning']); ?>    
<?php } ?>    
