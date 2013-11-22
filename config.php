<?php
defined('YII_DRESSING_PATH') or define('YII_DRESSING_PATH', dirname(__FILE__) . '/vendors/mrphp/yii-dressing/src');
require_once(YII_DRESSING_PATH . DS . '/YdConfig.php');

/**
 * Config is a helper class serving pre-application configuration.
 *
 * It encapsulates {@link YdConfig} which provides the actual implementation.
 * By writing your own Config class, you can customize some functionalities of YdConfig.
 */
class Config extends YdConfig
{

}
