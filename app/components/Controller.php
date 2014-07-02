<?php
/**
 * Controller
 */
class Controller extends CController
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

}
