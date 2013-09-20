<?php
$config = require(dirname(__FILE__) . '/main.php');

// web only preloads
$config['preload'][] = 'kint'; // cannot be in main.php  due to issue in commands
$config['preload'][] = 'bootstrap';

// -- LOG ROUTES --
// CDbLogRoute: saves messages in a database table.
// CEmailLogRoute: sends messages to specified email addresses.
// CFileLogRoute: saves messages in a file under the application runtime directory.
// CWebLogRoute: displays messages at the end of the current Web page.
// CProfileLogRoute: displays profiling messages at the end of the current Web page.

$config['components']['log']['routes'] = array();
if ($_ENV['_core']['setting']['debug']) {

    $config['components']['log']['routes'][] = array(
        'class' => 'CWebLogRoute',
        'levels' => $_ENV['_core']['setting']['debug_levels'],
        //'levels' => 'trace, info, error, warning, profile',
    );
    if ($_ENV['_core']['setting']['debug_db']) {
        $config['components']['log']['routes'][] = array(
            'class' => 'ProfileLogRoute',
            'levels' => 'profile',
        );
    }

}
else {

    // no debug, file log route
    $config['components']['log']['routes'][] = array(
        'class' => 'CFileLogRoute',
        'levels' => $_ENV['_core']['setting']['debug_levels'],
    );

}

// asset paths
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
if ($scriptName == '/') {
    $scriptName = '';
}
$config['components']['assetManager'] = array(
    'class' => 'AssetManager',
    'basePath' => dirname($_SERVER['SCRIPT_FILENAME']) . '/assets',
    'baseUrl' => $scriptName . '/assets',
);

// themes
if (!empty($_ENV['_core']['setting']['theme'])) {
    $config['theme'] = $_ENV['_core']['setting']['theme'];
    $config['components']['themeManager'] = array(
        'basePath' => dirname(dirname(__FILE__)) . '/themes',
    );
}
$config['params']['themes'] = array(
    '' => 'Bootstrap',
    'lite' => 'Lite',
    'admingrey' => 'Admin Grey',
    'bounce' => 'Bounce',
    'reboot' => 'Reboot',
);

// local config overrides
if (file_exists(dirname(__FILE__) . '/web.local.php')) {
    require(dirname(__FILE__) . '/web.local.php');
}
return $config;