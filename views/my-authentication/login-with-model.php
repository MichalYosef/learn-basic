<?php
use \yii\bootstrap\ActiveForm; 
use \yii\helpers\Html;
use \yii\bootstrap\Alert;
// this view is based on the model rules 
?>

<?php
    /* if an error occured in the login process (in the controller) - 
    display the error 
    */
    if($error != null) { 
        echo Alert::widget([ 'options' => [ 'class' => 'alert-danger' ], 'body' => $error ]);    
    }
?>

<?php

    // if user is not logged in yet

    if(Yii::$app->user->isGuest) 
    {     
        // Begin login form

        $form = ActiveForm::begin(['id' => 'login-form',]); 

        // username input 
        echo $form->field($model, 'username');

        // password input
        echo $form->field($model, 'password')->passwordInput();

        
 ?>

    <div class="form-group">
        <?= // submit button
            Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

<?php // close form
    ActiveForm::end(); 
?>
   
<?php } else { ?>
    <h2>You are authenticated!</h2>
    <br /><br />
    <?php echo Html::a('Logout',  ['my-authentication/logout'], ['class' => 'btn btn-warning']); ?>    
<?php } ?>    
