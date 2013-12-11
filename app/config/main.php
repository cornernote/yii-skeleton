<?php
/**
 * Application Configuration
 *
 * At this point in the runtime all constants have been defined and the environment has been configured.
 */
$app = Config::instance()->getValue('app');
$db = vd(Config::instance()->getValue('db'), array(
    'host' => 'localhost',
    'name' => 'test',
    'user' => 'root',
    'pass' => '',
));
return array(

    // yii settings
    'id' => vd($app['id'], 'app'),
    'name' => vd($app['name'], 'App'),
    'language' => vd($app['language'], 'en'),
    'theme' => vd($app['theme']),
    'params' => vd($app['params'], array()),

    // paths
    'basePath' => APP_PATH,
    'runtimePath' => dirname(APP_PATH) . DS . 'runtime',
    'aliases' => array(
        'public' => PUBLIC_PATH,
        'vendor' => VENDOR_PATH,
        'dressing' => VENDOR_PATH . '/mrphp/yii-dressing/yii-dressing',
        'bootstrap' => VENDOR_PATH . '/clevertech/yii-booster/src', // needs to be named bootstrap
    ),
    'import' => array(
        'application.models.*',
        'application.components.*',
        'dressing.models.*',
        'dressing.components.*',
    ),

    // libraries
    'components' => array(
        'cache' => array(
            'class' => 'CMemCache',
            'keyPrefix' => vd($app['id'], 'app') . '.',
            'servers' => array(
                array(
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    'weight' => 10,
                ),
            ),
        ),
        'db' => array(
            'connectionString' => "mysql:host={$db['host']};dbname={$db['name']}",
            'emulatePrepare' => true,
            'username' => $db['user'],
            'password' => $db['pass'],
            'charset' => 'utf8',
            'schemaCachingDuration' => 3600,
            'enableProfiling' => (YII_DEBUG && YII_DEBUG_TOOLBAR),
            'enableParamLogging' => (YII_DEBUG && YII_DEBUG_TOOLBAR),
        ),
        'themeManager' => array(
            'basePath' => APP_PATH . DS . 'themes',
        ),
        'assetManager' => array(
            'class' => 'dressing.components.YdAssetManager',
            'basePath' => PUBLIC_PATH . DS . 'assets',
            'baseUrl' => PUBLIC_URL . '/assets',
            'linkAssets' => true,
        ),
        'globalInit' => array(
            'class' => 'application.components.GlobalInit',
        ),
        'dressing' => array(
            'class' => 'dressing.YdDressing',
        ),
        'errorHandler' => array(
            'class' => 'dressing.components.YdErrorHandler',
            'errorAction' => 'site/error',
        ),
        'fatalErrorCatch' => array(
            'class' => 'dressing.components.YdFatalErrorCatch',
        ),
        'user' => array(
            'class' => 'dressing.components.YdWebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/account/login'),
            'behaviors' => array(
                'webUserFlash' => array(
                    'class' => 'dressing.behaviors.YdWebUserFlashBehavior',
                ),
            ),
        ),
        'returnUrl' => array(
            'class' => 'dressing.components.YdReturnUrl',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
            'fontAwesomeCss' => true,
        ),
        'urlManager' => array(
            'urlFormat' => isset($_GET['r']) ? 'get' : 'path', // allow filters in audit/index work
            'showScriptName' => false,
        ),
        'cacheFile' => array(
            'class' => 'CFileCache',
        ),
        'cacheDb' => array(
            'class' => 'CDbCache',
        ),
        'cacheApc' => array(
            'class' => 'CApcCache',
        ),
        'log' => array(
            'class' => 'CLogRouter',
        ),
        'clientScript' => array(
            'class' => 'YdClientScript',
        ),
        'session' => array(
            'class' => 'CCacheHttpSession',
            'cacheID' => 'cacheApc',
        ),
        'email' => array(
            'class' => 'dressing.components.YdEmail',
        ),
        'swiftMailer' => array(
            'class' => 'dressing.components.YdSwiftMailer',
        ),
        'auditTracker' => array(
            'class' => 'dressing.components.YdAuditTracker',
        ),
        'format' => array(
            'class' => 'dressing.components.YdFormatter',
        ),
        'reCapture' => array(
            'class' => 'dressing.components.YdReCapture',
        ),
        'widgetFactory' => array(
            'widgets' => array(
                'TbMenu' => array(
                    'activateParents' => true,
                ),
                'TbCKEditor' => array(
                    'editorOptions' => array(
                        // 'toolbar_Full' => array(
                        //     array('name' => 'document', 'items' => array('Source', '-', 'Save', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates')),
                        //     array('name' => 'clipboard', 'items' => array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo')),
                        //     array('name' => 'editing', 'items' => array('Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt')),
                        //     array('name' => 'forms', 'items' => array('Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField')),
                        //     array('name' => 'basicstyles', 'items' => array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat')),
                        //     array('name' => 'paragraph', 'items' => array('NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl')),
                        //     array('name' => 'links', 'items' => array('Link', 'Unlink', 'Anchor')),
                        //     array('name' => 'insert', 'items' => array('Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe')),
                        //     array('name' => 'styles', 'items' => array('Styles', 'Format', 'Font', 'FontSize')),
                        //     array('name' => 'colors', 'items' => array('TextColor', 'BGColor')),
                        //     array('name' => 'tools', 'items' => array('Maximize', 'ShowBlocks', '-', 'About')),
                        // ),
                        // 'toolbar_Basic' => array(
                        //     array('Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About'),
                        // ),
                        'toolbar_Full' => array(
                            array('name' => 'tools', 'items' => array('Source', 'Maximize', 'ShowBlocks')),
                            array('name' => 'clipboard', 'items' => array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo')),
                            array('name' => 'basicstyles', 'items' => array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat')),
                            array('name' => 'paragraph', 'items' => array('NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock')),
                            array('name' => 'links', 'items' => array('Link', 'Unlink', 'Anchor')),
                            array('name' => 'insert', 'items' => array('Image', 'Table', 'HorizontalRule', 'SpecialChar')),
                            array('name' => 'styles', 'items' => array('Format')),
                        ),
                        'toolbar_Basic' => array(
                            array('Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'),
                        ),
                        'toolbar' => 'Full',
                    ),
                ),
            ),
        ),

        
    ),
    'preload' => array(
        'log',
        'fatalErrorCatch',
        //'auditTracker', // sql in dressing.migrations.m000000_000003_audit.sql
        'bootstrap',
        'globalInit',
    ),
    'controllerMap' => array(
        'account' => 'dressing.controllers.YdAccountController',
        'attachment' => 'dressing.controllers.YdAttachmentController',
        'audit' => 'dressing.controllers.YdAuditController',
        'auditTrail' => 'dressing.controllers.YdAuditTrailController',
        'contactUs' => 'dressing.controllers.YdContactUsController',
        'emailSpool' => 'dressing.controllers.YdEmailSpoolController',
        'emailTemplate' => 'dressing.controllers.YdEmailTemplateController',
        'error' => 'dressing.controllers.YdErrorController',
        'lookup' => 'dressing.controllers.YdLookupController',
        'siteMenu' => 'dressing.controllers.YdSiteMenuController',
        'role' => 'dressing.controllers.YdRoleController',
        'setting' => 'dressing.controllers.YdSettingController',
        'user' => 'dressing.controllers.YdUserController',
    ),
    'commandMap' => array(
        'migrate' => array(
            'class' => 'system.cli.commands.MigrateCommand',
            'migrationPath' => 'application.migrations',
            'migrationTable' => 'migration',
            'connectionID' => 'db',
            'templateFile' => 'dressing.migrations.templates.migrate_template',
        ),
        'emailSpool' => 'dressing.commands.YdEmailSpoolCommand',
        'errorEmail' => 'dressing.commands.YdErrorEmailCommand',
    ),
);
