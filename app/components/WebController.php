<?php

/**
 * WebController
 * 
 * @mixin YdWebControllerBehavior
 */
class WebController extends Controller
{

    /**
     * @var string the default layout for the controller view.
     */
    public $layout = 'application.views.layouts.default';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    
    /**
     * @return array
     */
    public function behaviors()
    {
        return array(
            'webController' => array(
                'class' => 'dressing.behaviors.YdWebControllerBehavior',
            ),
        );
    }
    
}
