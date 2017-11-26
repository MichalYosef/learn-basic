<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>

<h2>Customers</h2>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'surname',
        'phone_number',
        
        [
            'header' => 'Reservations',
            'content' => function ($model, $key, $index, $column) {
                $title = sprintf('Reservations (%d)', $model->reservationsCount);
                return Html::a($title, ['reservations/grid', 'Reservation[customer_id]' => $model->id]);
            }
        ],

        
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'header' => 'Actions',
        ],        
    ],
]) ?>