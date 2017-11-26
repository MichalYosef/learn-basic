<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\BaseHtml;
?>
<h2>Reservations</h2>
<?php
$roomsFilterData = yii\helpers\ArrayHelper::map( app\models\
Room::find()->all(), 'id', function($model, $defaultValue) {
return sprintf('Floor: %d - Number: %d', $model->floor, $model->room_number);
});
?>
<?= \yii\grid\GridView::widget([
'dataProvider' => $dataProvider,
'filterModel' => $searchModel,
'columns' => [
'id',
['header' => 'Room',
'filter' => \yii\helpers\BaseHtml::activeDropDownList($searchModel,
'room_id', $roomsFilterData, ['prompt' => '--- all']),
'content' => function($model) {
return $model->room->floor;
}
],
[
    'class' => 'yii\grid\ActionColumn',
    'template' => '{delete}',
    'header' => 'Actions',
    ],
    ],
    ]) ?>