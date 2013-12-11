<?php
/**
 * ActiveRecord
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-skeleton/master/license.txt
 */
class ActiveRecord extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     *
     * @param string $className
     * @return YdAttachment the static model class
     */
    public static function model($className = null)
    {
        if (!$className)
            $className = get_called_class();
        return parent::model($className);
    }

}
