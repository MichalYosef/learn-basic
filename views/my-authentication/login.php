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

    <?php ActiveForm::begin(); ?>
    
    <div class="form-group">
    <?php echo Html::label('Username', 'username'); ?>
    <?php echo Html::textInput('username', '', ['class' => 'form-control']); ?>
    </div>
    
    <div class="form-group">
    <?php echo Html::label('Password', 'password'); ?>
    <?php echo Html::passwordInput('password', '', ['class' => 'form-control']); ?>
    </div>
    
    <?php echo Html::submitButton('Login', ['class' => 'btn btn-primary']); ?>

    <?php ActiveForm::end(); ?>
   
<?php } else { ?>
    
    <h2>You are authenticated!</h2>
    <br /><br />
    <?php echo Html::a('Logout',  ['my-authentication/logout'], ['class' => 'btn btn-warning']); ?>
        
<?php } ?>    




