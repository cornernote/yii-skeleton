<?php
/**
 * Application Gearman Worker Entry Script
 */

/**
 * Gets the application start timestamp.
 */
defined('YII_BEGIN_TIME') or define('YII_BEGIN_TIME', microtime(true));

/**
 * Setup the environment
 */
require_once(dirname(__FILE__) . '/config.php');
$config = Config::createInstance();

/**
 * Setup the autoloader.
 */
require_once(VENDOR_PATH . DS . 'autoload.php');

/**
 * run the Yii app (Yii-Haw!)
 */
require_once(APP_PATH . DS . 'globals.php');
require_once(APP_PATH . DS . 'yii.php');
require_once(VENDOR_PATH . DS . 'cornernote/yii-gearman/gearman/components/EGearmanApplication.php');
Yii::createGearmanApplication($config->getAppConfig())->run();
