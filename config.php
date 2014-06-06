<?php
defined('VENDOR_PATH') or define('VENDOR_PATH', str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, dirname(__FILE__) . '/vendor'));
require_once(VENDOR_PATH . '/cornernote/yii-dressing/yii-dressing/YdConfig.php');

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
        defined('APP_PATH') or define('APP_PATH', str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, dirname(__FILE__) . '/app'));
        parent::__construct(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.json');
    }

}
