<?php

// start the timer
$_ENV['_start'] = microtime(true);

// load settings
$config = dirname(__FILE__) . '/../config.php';
if (!file_exists($config)) {
    trigger_error('cannot find config file at "' . $config . '"', E_USER_ERROR);
}
$_ENV['_config'] = require($config);

// set debug levels
if ($_ENV['_config']['setting']['debug']) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $_ENV['_config']['setting']['debug']);
}
else {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    ini_set('log_errors', 0);
    defined('YII_DEBUG') or define('YII_DEBUG', false);
}

// include global functions
$globals = dirname(__FILE__) . '/../' . $_ENV['_config']['setting']['app_version'] . '/globals.php';
if (!file_exists($globals)) {
    trigger_error('cannot find globals file at "' . $globals . '"', E_USER_ERROR);
}
require_once($globals);

// define path to congig
$config = dirname(__FILE__) . '/../' . $_ENV['_config']['setting']['app_version'] . '/config/web.php';
if (!file_exists($config)) {
    trigger_error('cannot find config file at "' . $config . '"', E_USER_ERROR);
}

// include Yii
$yii = dirname(__FILE__) . '/../vendor/yiisoft/yii/framework/yii.php';
if (!file_exists($yii)) {
    trigger_error('cannot find framework file at "' . $yii . '"', E_USER_ERROR);
}
require_once($yii);

// run the Yii app (Yii-Haw!)
Yii::createWebApplication($config)->run();