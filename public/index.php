<?php
/**
 * Yii Web
 */
 
// start the timer
$_ENV['_start'] = microtime(true);

// include globals
require_once(dirname(dirname(__FILE__)) . '/app/globals.php');

// run yii-dressing
require_once(dirname(dirname(__FILE__)) . '/vendor/mrphp/yii-dressing/src/entry/index.php');
