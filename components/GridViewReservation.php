<?php

namespace app\components;

use Yii;
use yii\web\Controller;
use yii\grid\GridView;
/*
This component just extends yii\grid\GridView and overrides the
renderTableFooter() method to make the required customization (mainly
merging cells). The only logic in this code is to find the price_per_day column,
cycling the array of columns given by $this->columns, where $this refers to
the GridView object.
*/
class GridViewReservation extends GridView
{
    public function renderTableFooter()
    {
        // Search column for 'price_per_day'
        $columnPricePerDay = null;
        foreach($this->columns as $column)
        {
            if(get_class($column) == 'yii\grid\DataColumn')
            {
                if($column->attribute == 'price_per_day') $columnPricePerDay = $column;
            }
        }
        
        $html = '<tfoot><tr>';
        $html .= '<td colspan="3"><b>Average:</b></td>';
        $html .= $columnPricePerDay->renderFooterCell();
        $html .= '<td colspan="4"><i>this space is intentionally empty</i></td>';
        $html .= '</tr></tfoot>';
        
        
        return $html;
    }
}
