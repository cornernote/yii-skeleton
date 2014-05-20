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
        'public' => WWW_PATH,
        'vendor' => VENDOR_PATH,
        'audit' => VENDOR_PATH . '/cornernote/yii-audit-module/audit',
        'account' => VENDOR_PATH . '/cornernote/yii-account-module/account',
        'email' => VENDOR_PATH . '/cornernote/yii-email-module/email',
        'menu' => VENDOR_PATH . '/cornernote/yii-menu-module/menu',
        'dressing' => VENDOR_PATH . '/cornernote/yii-dressing/yii-dressing',
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
        //'attachment' => 'dressing.controllers.YdAttachmentController',
        //'lookup' => 'dressing.controllers.YdLookupController',
        //'setting' => 'dressing.controllers.YdSettingController',
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
    ),

    // components
    'components' => array(
        'assetManager' => array(
            'class' => 'dressing.components.YdAssetManager',
            'basePath' => WWW_PATH . DS . 'assets',
            'baseUrl' => WWW_URL . '/assets',
            'linkAssets' => true,
        ),
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'defaultRoles' => array('authenticated'),
            'connectionID' => 'db',
            'itemTable' => 'auth_item',
            'itemChildTable' => 'auth_item_child',
            'assignmentTable' => 'auth_assignment',
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
            'keyPrefix' => vd($app['id'], 'app') . '.',
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
            'enableProfiling' => YII_DEBUG,
            'enableParamLogging' => YII_DEBUG,
        ),
        'dressing' => array(
            'class' => 'dressing.YdDressing',
        ),
        'emailManager' => array(
            'class' => 'EmailManager',
        ),
        'errorHandler' => array(
            'class' => 'audit.components.AuditErrorHandler',
            'trackAllRequests' => true,
            'errorAction' => 'site/error',
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
                    'levels' => 'profile',
                ),
            ),
        ),
        'returnUrl' => array(
            'class' => 'vendor.cornernote.yii-return-url.return-url.components.EReturnUrl',
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
            'rules' => array(
                // account
                '<action:(login|logout|signup)>' => '/account/user/<action>',
                'account/<action:(changePassword|activate|update|lostPassword|resetPassword)>' => '/account/user/<action>',
                'account/resendActivation/*' => '/account/user/resendActivation',
                'account' => '/account/user/view',
            ),
        ),
        'user' => array(
            'class' => 'account.components.AccountWebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/login'),
            'behaviors' => array(
                'accountWebUser' => array(
                    'class' => 'account.components.AccountWebUserBehavior',
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
        'account' => array(
            'class' => 'account.AccountModule',
            'useAccountUserController' => false,
            'layout' => 'application.views.layouts.default',
            'userClass' => 'User',
            'userIdentityClass' => 'UserIdentity',
        ),
        'audit' => array(
            'class' => 'audit.AuditModule',
            //'autoCreateTables' => false,
            'adminUsers' => array('admin'),
            'userViewUrl' => array('/user/view', 'id' => '--user_id--'),
        ),
        'email' => array(
            'class' => 'email.EmailModule',
            //'autoCreateTables' => false,
            'adminUsers' => array('admin'),
        ),
        'menu' => array(
            'class' => 'menu.MenuModule',
            //'autoCreateTables' => false,
            'adminUsers' => array('admin'),
            'connectionID' => 'db',
            'cacheID' => 'cache',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'generatorPaths' => array(
                'vendor.cornernote.gii-tasty-templates.tasty',
                'vendor.cornernote.gii-modeldoc-generator.gii',
                'bootstrap.gii',
            ),
            'password' => YII_DEBUG ? false : null,
        ),
    ),
    
);
