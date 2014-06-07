<?php

/**
 * @mixin AccountWebUserBehavior
 * @property User $user
 */
class WebUser extends CWebUser
{

    /**
     *
     */
    public function init()
    {
        if (!in_array(get_class(Yii::app()), array('CConsoleApplication', 'EGearmanApplication'))) {
            parent::init();
        }
    }

}
