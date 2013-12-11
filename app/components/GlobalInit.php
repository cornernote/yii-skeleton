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

        // set user theme
        $user = $app->user;
        if ($user->user && $user->user->asa('EavBehavior'))
            if ($theme = $user->user->getEavAttribute('theme'))
                $app->setTheme($theme);
                
        // add style/script files for non-ajax requests
        if (!$app->request->isAjaxRequest) {

            // init widgets
            $controller = new CController('preloadController');
            $controller->widget('dressing.widgets.YdModal');
            $controller->widget('dressing.widgets.YdFancyBox');
            $controller->widget('dressing.widgets.YdQTip');

            // dressing styles
            $cs = $app->clientScript;
            $cs->registerCSSFile($app->dressing->getAssetsUrl() . '/css/yii-dressing.css');
            
            // app style/script
            $assetsUrl = $app->getAssetManager()->publish(Yii::getPathOfAlias('application.assets'));
            $cs->registerCSSFile($assetsUrl . '/css/app.css', 'screen, projection');
            $cs->registerScriptFile($assetsUrl . '/js/app.js');
            
        }
    }

}
