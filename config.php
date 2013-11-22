<?php
defined('YII_DRESSING_PATH') or define('YII_DRESSING_PATH', dirname(__FILE__) . '/vendor/mrphp/yii-dressing/src');
require_once(YII_DRESSING_PATH . '/YdConfig.php');

/**
 * Config is a helper class serving pre-application configuration.
 *
 * It encapsulates {@link YdConfig} which provides the actual implementation.
 * By writing your own Config class, you can customize some functionalities of YdConfig.
 */
class Config extends YdConfig
{
  
    /**
     * Force loading config.json
     * @param null $file
     */
    public function __construct($file = null)
    {
        parent::__construct(dirname(__FILE__) . 'config.json');
    }

}
