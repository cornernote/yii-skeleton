<?php
/**
 * GlobalInit is loaded (preloaded) directly after CWebApplication has been loaded
 */
class GlobalInit
{

    /**
     * Initilize the application
     */
    public function init()
    {
        parent::init();
        $app = Yii::app();
        $user = $app->user;

        if (!$app->request->isAjaxRequest) {
            // fake controller
            $controller = new CController('preloadController');
    
            // set user theme
            if ($user->user && $user->user->asa('EavBehavior'))
                if ($theme = $user->user->getEavAttribute('theme'))
                    $app->setTheme($theme);
    
            // init widgets
            if (!$app->request->isAjaxRequest) {
                $app->clientScript->registerCSSFile($app->dressing->getAssetsUrl() . '/css/yii-dressing.css');
                $this->widget('dressing.widgets.YdModal');
                $this->widget('dressing.components.YdFancyBox');
                $this->widget('dressing.widgets.YdQTip');
            }
        }
    }

}
