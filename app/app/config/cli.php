<?php
$config = require(dirname(__FILE__) . '/main.php');

$config['components']['db']['enableProfiling'] = false;
$config['components']['db']['enableParamLogging'] = false;
$config['commandMap']['migrate'] = array(
	'class' => 'system.cli.commands.MigrateCommand',
	'migrationPath' => 'application.migrations',
	'migrationTable' => 'migration',
	'connectionID' => 'db',
	'templateFile' => 'application.migrations.templates.migrate_template',
);

// local config overrides
if (file_exists(dirname(__FILE__) . '/cli.local.php')) {
    require(dirname(__FILE__) . '/cli.local.php');
}
return $config;