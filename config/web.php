<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'learn-basic',
    'name' => 'Learning Yii basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@uploadedfilesdir' => '@app/uploadedfiles'
    ],
    'components' => [
        /* authManager: 
        Both methods (PhpManager / DbManager) are based on three objects: 
        permissions, roles, and rules. 
        The permissions method represents actions that can be controlled;
        roles are a set of permissions to which the target can be enabled or 
        less; and rules are extra validations that will be executed when a 
        permission is checked.
        Finally, permissions or roles can be assigned to users and identified 
        by the IdentityInterface::getId() value of the Yii::$app->user component.
        */
        'authManager' => [
            'class' => 'yii\rbac\PhpManager', //'class' => 'yii\rbac\DbManager,
        ],
        /*
        request: This component handles all client requests and provides methods
        to easily get parameters from server global variables, such as $_SERVER,
        $_POST, $_GET, and $_COOKIES.
        */
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1GjJUW0I_yTDKOptUA2_XQLE6jfcgSxU',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
       
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'news/<year:\d{4}>/items-list' => 'news/items-list',
                'news/<category:\w+>/items-list' => 'news/items-list',
                /*
                [
                    'pattern' => 'news/<category:\w+>/items-list',
                    'route' => 'news/items-list',
                    'defaults' => ['category' => 'shopping']
                ]
                */
                ],
        ],
       
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
