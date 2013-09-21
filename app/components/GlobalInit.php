<?php
/**
 * In configuration file main.php add this lines of code:
 * 'preload'=>array('globalInit',...),
 *  ...
 * 'components'=>array(
 *   ...
 *   'globalInit'=>array(
 *     'class'=>'GlobalInit',
 *   ),
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
        date_default_timezone_set(Setting::item('timezone'));
        $timeLimit = isCli() ? 5 : param('time_limit');
        set_time_limit($timeLimit);
        ini_set('max_execution_time', $timeLimit);
        ini_set('memory_limit', Setting::item('memory_limit'));
        ini_set('xdebug.max_nesting_level', 200);

        // start the audit
        YdAudit::findCurrent();
    }
}
