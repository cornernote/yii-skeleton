<?php
/**
 * ActiveRecord
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
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

    /**
     * Allows setting default attributes before validation and saving in a single method.
     *
     * @see beforeValidate()
     * @see beforeSave()
     */
    public function setDefaultAttributes()
    {
    }

    /**
     * Actions to be performed before the model is saved
     *
     * @return bool
     */
    protected function beforeValidate()
    {
        $this->setDefaultAttributes();
        return parent::beforeValidate();
    }

    /**
     * Actions to be performed before the model is saved
     *
     * @return bool
     */
    protected function beforeSave()
    {
        $this->setDefaultAttributes();
        return parent::beforeSave();
    }

}
