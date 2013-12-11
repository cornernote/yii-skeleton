<?php
/**
 * Application CLI Entry Script
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-skeleton/master/license.txt
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
 * run the Yii app (Yii-Haw!)
 */
require_once(APP_PATH . DS . 'globals.php');
require_once(APP_PATH . DS . 'yii.php');
Yii::createConsoleApplication($config->getAppConfig())->run();
