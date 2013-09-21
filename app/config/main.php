<?php
/**
 * Main Config
 *
 * DO NOT EDIT THIS FILE
 * create a file called:
 * main.local.php
 */

$config = array(

    // yii settings
    'id' => $_ENV['_config']['setting']['id'],
    'name' => $_ENV['_config']['setting']['name'],
    'language' => $_ENV['_config']['setting']['language'],
	'charset' => $_ENV['_config']['setting']['charset'],

    // paths
    'basePath' => dirname(dirname(__FILE__)),
    'runtimePath' => dirname(dirname(dirname(__FILE__))) . DS . 'runtime',
	'aliases' => array(
		'vendor' => dirname(dirname(dirname(__FILE__))) . DS . 'vendor',
		'dressing' => dirname(dirname(dirname(__FILE__))) . DS . 'vendor' . DS . 'mrphp' . DS . 'yii-dressing' . DS . 'src',
		'booster' => dirname(dirname(dirname(__FILE__))) . DS . 'vendor' . DS . 'clevertech' . DS . 'yii-booster' . DS . 'src',
	),
		
    // preload classes
    'preload' => array(
		'fatalErrorCatch',
        'log',
		'globalInit',
		'yiiDressing',
    ),

    // import paths
    'import' => array(
        'application.commands.*',
        'application.models.*',
        'application.components.*',
    ),

    // modules
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            'generatorPaths' => array(
                'application.modules.gii.generators', // a path alias
            ),
            'ipFilters' => array('127.0.0.1'),
        ),
    ),

    // components
    'components' => array(
		'yiiDressing' => array(
            'class' => 'dressing.YiiDressing',
		),
        'errorHandler' => array(
            'class' => 'dressing.components.YdErrorHandler',
            'errorAction' => 'site/error',
        ),
        'fatalErrorCatch' => array(
            'class' => 'dressing.components.YdFatalErrorCatch',
        ),
        'bootstrap' => array(
            'class' => 'booster.components.Bootstrap',
        ),
        'user' => array(
            'class' => 'application.components.WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/account/login'),
        ),
        'urlManager' => array(
            'urlFormat' => isset($_GET['r']) ? 'get' : 'path', // allow filters in audit/index work
            'showScriptName' => false,
        ),
        'db' => array(
            'connectionString' => "mysql:host={$_ENV['_config']['db']['host']};dbname={$_ENV['_config']['db']['name']}",
            'emulatePrepare' => true,
            'username' => $_ENV['_config']['db']['user'],
            'password' => $_ENV['_config']['db']['pass'],
            'charset' => 'utf8',
            'schemaCachingDuration' => 3600,
            'enableProfiling' => $_ENV['_config']['setting']['debug_db'],
            'enableParamLogging' => $_ENV['_config']['setting']['debug_db'],
        ),
        'cacheFile' => array(
            'class' => 'CFileCache',
        ),
        'cache' => array(
            'class' => 'CMemCache',
            'keyPrefix' => $_ENV['_config']['setting']['id'] . '.',
            'servers' => array(
                array(
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    'weight' => 10,
                ),
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
        ),
        'clientScript' => array(
            'class' => 'YdClientScript',
        ),
        'swiftMailer' => array(
            'class' => 'application.extensions.swiftMailer.SwiftMailer',
        ),
    ),

    // default settings, access using: Setting::item('paramName')
    // add field to views.setting.index to allow override
    'params' => array(
        'dateFormat' => 'Y-m-d',
        'dateFormatLong' => 'Y-m-d',
        'timeFormat' => 'H:i:s',
        'timeFormatLong' => 'H:i:s',
        'dateTimeFormat' => 'Y-m-d H:i:s',
        'dateTimeFormatLong' => 'Y-m-d H:i:s',
        'allowAutoLogin' => true,
        'rememberMe' => true,
        'defaultPageSize' => '10',
        'recaptcha' => false,
        'recaptchaPrivate' => '6LeBItQSAAAAALA4_G05e_-fG5yH_-xqQIN8AfTD',
        'recaptchaPublic' => '6LeBItQSAAAAAG_umhiD0vyxXbDFbVMPA0kxZUF6',
    ),

);
// local main config overrides
$local = array();
if (file_exists(dirname(__FILE__) . '/main.local.php')) {
    $local = require(dirname(__FILE__) . '/main.local.php');
}
return CMap::mergeArray($config, $local);