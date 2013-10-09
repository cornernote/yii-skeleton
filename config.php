<?php
/**
 * Core Config - DO NOT EDIT THIS FILE ON LIVE
 * create a file called: config.local.php
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */

// default settings
$_config = array(
    'path' => dirname(__FILE__),
    'db' => array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'name' => 'test',
        'setting' => 'setting',
    ),
    'setting' => array(
        'id' => 'app',
        'name' => 'App',
        'language' => 'en',
        'charset' => 'utf-8',
        'timezone' => 'GMT',
        'theme' => null,
        'app_version' => 'app',
        'debug' => true,
        'debug_db' => false,
        'debug_levels' => 'error,warning',
        'email' => 'webmaster@localhost',
        'error_email' => 'webmaster@localhost',
        'time_limit' => 60,
        'memory_limit' => '128M',
        'audit' => false,
    ),
);

// local settings
if (file_exists(dirname(__FILE__) . '/config.local.php')) {
    require(dirname(__FILE__) . '/config.local.php');
}

// database settings
$_config_db = mysql_connect($_config['db']['host'], $_config['db']['user'], $_config['db']['pass']);
if ($_config_db && mysql_select_db($_config['db']['name'], $_config_db)) {
    mysql_set_charset('utf8', $_config_db);
    $_config['db']['setting'] = isset($_config['db']['setting']) ? $_config['db']['setting'] : 'setting'; // decide which table to use
    $q = mysql_query("SELECT * FROM {$_config['db']['setting']}", $_config_db);
    if ($q) while ($row = mysql_fetch_assoc($q))
        $_config['setting'][$row['key']] = $row['value'];
    mysql_close($_config_db);
    unset($_config_db);
}

// here ya go
return $_config;