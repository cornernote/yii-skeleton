<?php
/**
 *
 */
class GlobalInit extends CApplicationComponent
{
    /**
     *
     */
    public function init()
    {
        parent::init();

        // set default php settings
        date_default_timezone_set(YdSetting::item('timezone'));
        $timeLimit = isCli() ? 0 : param('time_limit');
        set_time_limit($timeLimit);
        ini_set('max_execution_time', $timeLimit);
        ini_set('memory_limit', YdSetting::item('memory_limit'));

    }
}
