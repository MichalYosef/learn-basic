<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>

<h2>Reservations</h2>

<?php 
$sumOfPricesPerDay = 0;
$averagePricePerDay = 0;

if(sizeof($dataProvider->getModels()) > 0)
{
    foreach($dataProvider->getModels() as $m) $sumOfPricesPerDay += $m->price_per_day;
    $averagePricePerDay = $sumOfPricesPerDay / sizeof($dataProvider->getModels());
}  
?>

<?php 
$roomsFilterData = yii\helpers\ArrayHelper::map( app\models\Room::find()->all(), 'id', function($model, $defaultValue) {
    return sprintf('Floor: %d - Number: %d', $model->floor, $model->room_number);
});
?>

<?= app\components\GridViewReservation::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showFooter' => true,
    'columns' => [
        'id',
        
        [
            'header' => 'Room',
            'filter' => Html::activeDropDownList($searchModel, 'room_id', $roomsFilterData, ['prompt' => '--- all']),
            'content' => function($model) {
                return $model->room->floor;
            }
        ],

        [
            'header' => 'Customer',
            'attribute' => 'customer.surname',
        ],
        
        [
            'attribute' => 'price_per_day',
            'footer' => Yii::$app->formatter->asCurrency($resultQueryAveragePricePerDay, 'EUR')
        ],
        
        'date_from',
        'date_to',
        
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'header' => 'Actions',
        ],        
    ],
]) ?>