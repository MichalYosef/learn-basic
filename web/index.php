<?php


// comment out the following two code lines when deployed to production

/*
YII_DEBUG defines whether you are in debug mode or not. 
If we set this, we will have more log information and will see the detail 
error call stack.
*/
defined('YII_DEBUG') or define('YII_DEBUG', true);
/*
YII_ENV defines the environment mode we are working in, and its default value
is prod. The available values are test, dev, and prod. These values are used in
configuration files to define, for example, a different DB connection (local database
different from remote database) or other values, always in configuration files.
*/
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();

/*
Routes are passed to entry script basic/web/index.php through the r parameter

The default page http://hostname/basic/web/index.php is equivalent 
to               http://hostname/basic/web/index.php?r=site/index.
*/