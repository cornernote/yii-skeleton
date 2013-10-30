<?php
/**
 * Yii CLI
 */

// start the timer
defined('APP_START') or define('APP_START', microtime(true));

// include globals
require_once(dirname(__FILE__) . '/app/globals.php');

// run yii-dressing
require_once(dirname(__FILE__) . '/vendor/mrphp/yii-dressing/src/entry/yiic.php');
