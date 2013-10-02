<?php
/**
 *
 */
class GlobalInit extends CApplicationComponent
{

    /**
     * @var
     */
    public $timeZone;

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
        date_default_timezone_set($this->timeZone);
        set_time_limit($this->timeLimit);
        ini_set('max_execution_time', $this->timeLimit);
        ini_set('memory_limit', $this->memoryLimit);

    }
}
