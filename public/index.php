<?php
/**
 * Yii Web
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Brett O'Donnell <cornernote@gmail.com>, Zain Ul abidin <zainengineer@gmail.com>
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */

// start the timer
$_ENV['_start'] = microtime(true);

// define directory separator shortcut
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

// ensure cli is not being called
if (substr(php_sapi_name(), 0, 3) == 'cli') {
    trigger_error('This script cannot be run from a CLI.', E_USER_ERROR);
}

// include Yii
require_once(dirname(dirname(__FILE__)) . DS . 'vendor' . DS . 'yiisoft' . DS . 'yii' . DS . 'framework' . DS . 'yii.php');

// include globals
require_once(dirname(dirname(__FILE__)) . DS . 'app' . DS . 'globals.php');

// include config
require_once(dirname(dirname(__FILE__)) . DS . 'vendor' . DS . 'mrphp' . DS . 'yii-dressing' . DS . 'src' . DS . 'components' . DS . 'YdConfig.php');
$config = YdConfig::instance(array('appPath' => dirname(dirname(__FILE__)) . DS . 'app'))->getWebConfig();

// run the Yii app (Yii-Haw!)
Yii::createWebApplication($config)->run();
