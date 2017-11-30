<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\User;
use app\models\LoginForm;

class MyAuthenticationController extends Controller
{
    public function actionInitializeAuthorizations()
    {
        $auth = Yii::$app->authManager;
        
        // Reset all
        $auth->removeAll();
        
        // add "createReservation" permission
        $permCreateReservation = $auth->createPermission('createReservation');
        $permCreateReservation->description = 'Create a reservation';
        $auth->add($permCreateReservation);

        // add "updatePost" permission
        $permUpdateReservation = $auth->createPermission('updateReservation');
        $permUpdateReservation->description = 'Update reservation';
        $auth->add($permUpdateReservation);

        // add "operator" role and give this role the "createReservation" permission
        $roleOperator = $auth->createRole('operator');
        $auth->add($roleOperator);
        $auth->addChild($roleOperator, $permCreateReservation);

        // add "admin" role and give this role the "reservation" permission
        // as well as the permissions of the "operator" role
        $roleAdmin = $auth->createRole('admin');
        $auth->add($roleAdmin);
        $auth->addChild($roleAdmin, $permUpdateReservation);
        $auth->addChild($roleAdmin, $roleOperator);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($roleOperator, 2);
        $auth->assign($roleAdmin, 1);
    }    
    
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                /*
                This method applies an ACF (Action Control Filter) to only two 
                actions, 
                actionPublicPage and actionPrivatePage (based only on the 
                property value)
                */
                'only' => ['public-page', 'private-page'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['public-page'],
                        'roles' => ['?'], //guest user
                    ],
                    [/*
                        restricts access for private pages that specify 
                        the roles as @.
                    */
                        'allow' => true,
                        'actions' => ['private-page'],
                        'roles' => ['@'], //authenticated user

                    ],
                ],
                
                // Callable function when user is denied
                'denyCallback' => function($rule, $data) {
                    $this->redirect(['login']);
                }
            ],
        ];
    }    
    
    public function actionLogin()
    {
        // an $error variable to pass an error description to the view
        $error = null;
        
        // get username and password data from $_POST 

        $username = Yii::$app->request->post('username', null);
        $password = Yii::$app->request->post('password', null);
        
        // search user by user name in db
        
        $user = User::findOne(['username' => $username]);
        
        // if username and password are not empty
        if(($username!=null)&&($password!=null))
        {
            // if user was found in db
            if($user != null)
            {
                // validate the inserted password 
                
                if($user->validatePassword($password))
                {
                    // logg in the user
                    Yii::$app->user->login($user);
                }
                else 
                {
                    // password is not valid (insert error text for the view)
                    $error = 'Password validation failed!';
                }
            }
            else
            {
                // username was not found in db
                // (insert error text for the view)
                $error = 'User not found';
            }
        }
        
        // render view
        return $this->render('login', ['error' => $error]);
    }
    
    
    public function actionLogout()
    {
        //log the user out from the session 
        Yii::$app->user->logout();

        //redirect the browser to the login page
        return $this->redirect(['login']);
    }


    /* actionLoginWithModel: handles login fields through the model 
       instead of parameters from $_POST
    */
    public function actionLoginWithModel()
    {
        $error = null;
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if(($model->validate())&&($model->user != null))
            {
                Yii::$app->user->login($model->user);
            }
            else
            {
                $error = 'Username/Password error';
            }
        }
        
        return $this->render('login-with-model', ['model' => $model, 'error' => $error]);
    }    

    public function actionPublicPage()
    {
        return $this->render('public-page');
    }    
    
    public function actionPrivatePage()
    {
        return $this->render('private-page');
    }    
        
    
}
