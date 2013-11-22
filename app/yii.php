<?php
require_once(YII_DRESSING_PATH . '/YdBase.php');

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It encapsulates {@link YdBase} which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of YdBase.
 */
class Yii extends YdBase
{

    /**
     * @return Application this method exists so phpStorm will code complete correctly for Yii::app().
     */
    public static function app()
    {
        return parent::app();
    }

}
