<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Customer;
use yii\data\ActiveDataProvider;

class CustomersController extends Controller
{
    public function actionGrid()
    {
        $query = Customer::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('grid', [ 'dataProvider' => $dataProvider ]);
        
    }
    
    public function actionCreateMultipleModels()
    {
        $models = [];
        
        if(isset($_POST['Customer']))
        {
             $validateOK = true;
            
            foreach($_POST['Customer'] as $postObj)
            {
                $model = new Customer();
                $model->attributes = $postObj;
                $models[] = $model;

                $validateOK = ($validateOK && ($model->validate()));               
            }
            
            // All models are validated and will be saved
            if($validateOK)
            {
                foreach($models as $model)
                {
                    $model->save();
                }
                
                // Redirect to grid after save
                return $this->redirect(['grid']);
            }
        }
        else
        {
            for($k=0;$k<3;$k++)
            {
                $models[] = new Customer();
            }    
        }
        
        return $this->render('createMultipleModels', ['models' => $models]);
    }
}
