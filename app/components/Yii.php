<?php

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It encapsulates {@link YiiBase} which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of YiiBase.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system
 * @since 1.0
 *
 *
 * @method WebApplication static app() app()
 */
class Yii extends YiiBase
{

    /**
     * Returns the application singleton or null if the singleton has not been created yet.
     * @return WebApplication the application singleton, null if the singleton has not been created yet.
     */
    public static function app()
    {
        return parent::app();
    }

}