<?php
/**
 * Controller
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
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
