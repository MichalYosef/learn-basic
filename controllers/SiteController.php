<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


/*
SiteController controller will be called when no route is specified in request.
*/


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionHelloWorld($nameToDisplay)
    {
        /*
        When we use parameters in the action function, we must remember that they
        will be mandatory and we must respect the order when passing it to the request.
        To avoid this obligation, we can use the old method, parsing parameters into
        the function:
        */

        $nameToDisplay = Yii::$app->request->get('nameToDisplay');
        // Equivalent to
        // $nameToDisplay =
        isset($_GET['nameToDisplay'])?$_GET['nameToDisplay']:null;
        
        return $this->render('helloWorld',
                             [ 'nameToDisplay' => $nameToDisplay ]);

        /*
        call it with the link:
        http://localhost/yii2/learn-basic/web/index.php?r=site/hello-world&nameToDisplay=Foo
        */
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'static' => [
                'class' => 'yii\web\ViewAction',
                'viewPrefix' => 'static'
            ],
            // 'pages' => [
            //     'class' => 'yii\web\ViewAction',
            // ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAdvTest()
    {
        return $this->render('advTest');
    }
}
