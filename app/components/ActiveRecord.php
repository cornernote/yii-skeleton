<?php
/**
 * ActiveRecord
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
