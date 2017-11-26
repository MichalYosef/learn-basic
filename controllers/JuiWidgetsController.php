<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Reservation;

class JuiWidgetsController extends Controller
{
    public function actionDatePicker()
    {
        $reservationUpdated = false;
        
        $reservation = Reservation::findOne(1);
        
        if(isset($_POST['Reservation']))
        {
            $reservation->load( Yii::$app->request->post() );
            
            $reservation->date_from = Yii::$app->formatter->asDate(  date_create_from_format('d/m/Y', $reservation->date_from), 'php:Y-m-d' );
            $reservation->date_to = Yii::$app->formatter->asDate(  date_create_from_format('d/m/Y', $reservation->date_to), 'php:Y-m-d' );
            
            $reservationUpdated = $reservation->save();
        }
        
        return $this->render('datePicker', ['reservation' => $reservation, 'reservationUpdated' => $reservationUpdated]);
    }
}
