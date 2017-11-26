<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=basic-yii-git',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    /*
    An anonymous function, attached to on afterOpen event handlers, has an $event
    parameter, which is an instance of the yii\base\ActionEvent class. This class has
    a $sender object that refers to the sender of the event. In this case, $sender refers to
    the instance of database components (db). This property may also be null when this
    event is a class-level event.
    */
    /*
    after db loads set to timezone israel (+2)
    */
    // 'on afterOpen' => function($event) 
    // {
    //     $event->sender->createCommand("SET time_zone = '+02:00'")->execute();
    // }

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
