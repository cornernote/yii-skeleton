<?php
/**
 * GlobalInit
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Brett O'Donnell <cornernote@gmail.com>, Zain Ul abidin <zainengineer@gmail.com>
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */
class GlobalInit extends CApplicationComponent
{

    /**
     * @var
     */
    public $timezone;

    /**
     * @var
     */
    public $timeLimit;

    /**
     * @var
     */
    public $memoryLimit;

    /**
     *
     */
    public function init()
    {
        parent::init();

        // set default php settings
        date_default_timezone_set($this->timezone);
        set_time_limit($this->timeLimit);
        ini_set('max_execution_time', $this->timeLimit);
        ini_set('memory_limit', $this->memoryLimit);

    }
}
