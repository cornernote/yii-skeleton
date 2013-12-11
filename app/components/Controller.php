<?php
/**
 * Controller
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license https://raw.github.com/cornernote/yii-skeleton/master/license.txt
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
            //'webUserType' => array('dressing.components.YdWebUserTypeFilter'),
        );
    }

}
