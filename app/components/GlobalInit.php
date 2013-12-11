<?php
/**
 * GlobalInit is loaded (preloaded) directly after CWebApplication has been loaded
 */
class GlobalInit
{

    public function init()
    {

        // fake controller
        $controller = new CController('preloadController');
        
        // load QTip on every page
        $controller->widget('dressing.widgets.YdQTip');
        
    }

}
