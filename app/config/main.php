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
        'bootstrap' => VENDOR_PATH . '/crisu83/yiistrap', // needs to be named bootstrap
    ),
    'import' => array(
        'application.models.*',
        'application.components.*',
        'dressing.models.*',
        'dressing.components.*',
    ),

    // maps
    'controllerMap' => array(
        'account' => 'dressing.controllers.YdAccountController',
        'attachment' => 'dressing.controllers.YdAttachmentController',
        'lookup' => 'dressing.controllers.YdLookupController',
        'setting' => 'dressing.controllers.YdSettingController',
    ),
    'commandMap' => array(
        'migrate' => array(
            'class' => 'system.cli.commands.MigrateCommand',
            'migrationPath' => 'application.migrations',
            'migrationTable' => 'migration',
            'connectionID' => 'db',
            'templateFile' => 'dressing.migrations.templates.migrate_template',
        ),
        'emailSpool' => 'email.commands.EmailSpoolCommand',
    ),

    // preload
    'preload' => array(
        'log',
        'errorHandler',
        'globalInit',
    ),

    // components
    'components' => array(
        'assetManager' => array(
            'class' => 'dressing.components.YdAssetManager',
            'basePath' => PUBLIC_PATH . DS . 'assets',
            'baseUrl' => PUBLIC_URL . '/assets',
            'linkAssets' => true,
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
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
        'cacheApc' => array(
            'class' => 'CApcCache',
        ),
        'cacheDb' => array(
            'class' => 'CDbCache',
        ),
        'cacheFile' => array(
            'class' => 'CFileCache',
        ),
        'clientScript' => array(
            'class' => 'YdClientScript',
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
        'dressing' => array(
            'class' => 'dressing.YdDressing',
        ),
        'emailManager' => array(
            'class' => 'email.components.EmailManager',
        ),
        'errorHandler' => array(
            'class' => 'audit.components.AuditErrorHandler',
            'trackAllRequests' => true,
            'errorAction' => 'site/error',
        ),
        'globalInit' => array(
            'class' => 'application.components.GlobalInit',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => YII_DEBUG ? 'CWebLogRoute' : 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'audit.components.AuditLogRoute',
                    'levels' => 'error, warning, audit, profile',
                ),
                array(
                    'class' => 'vendor.malyshev.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'levels' => YII_DEBUG_TOOLBAR ? 'profile' : '',
                ),
            ),
        ),
        'reCapture' => array(
            'class' => 'dressing.components.YdReCapture',
        ),
        'returnUrl' => array(
            'class' => 'vendor.cornernote.yii-return-url.components.EReturnUrl',
        ),
        'session' => array(
            'class' => 'CDbHttpSession',
            //'class' => 'CCacheHttpSession', // caused an issue with flash messages not clearing
            //'cacheID' => 'cacheApc',
        ),
        'themeManager' => array(
            'basePath' => APP_PATH . DS . 'themes',
        ),
        'urlManager' => array(
            'urlFormat' => isset($_GET['r']) ? 'get' : 'path', // allow filters in audit/index work
            'showScriptName' => false,
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
    
    // modules
    'modules' => array(
        'audit' => array(
            'class' => 'vendor.cornernote.yii-audit-module.audit.AuditModule',
            //'autoCreateTables' => false,
            'adminUsers' => array('brett@mrphp.com.au'),
            'userViewUrl' => array('/user/view', 'id' => '--user_id--'),
        ),
        'email' => array(
            'class' => 'vendor.cornernote.yii-email-module.email.EmailModule',
            //'autoCreateTables' => false,
            'adminUsers' => array('brett@mrphp.com.au'),
        ),
    ),
    
);
