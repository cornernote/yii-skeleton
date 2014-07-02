<?php

/**
 * Application is not loaded. It exists so phpStorm links to application components correctly.
 *
 * @property array $onEndRequest
 * @property array $onError
 * @property array $onException
 * @property string $theme
 * @property CFormatter $format
 * @property CMemCache $cache
 * @property CApcCache $cacheApc
 * @property CDbCache $cacheDb
 * @property CFileCache $cacheFile
 * @property YdDressing $dressing
 * @property CClientScript $clientScript
 * @property EReturnUrl $returnUrl
 * @property ETokenManager $tokenManager
 * @property EmailManager $emailManager
 * @property AccountWebUser $user
 * @property WebController $controller
 * @property TbApi $bootstrap
 * 
 * @method CClientScript getClientScript() getClientScript()
 */
class Application extends CWebApplication
{

}
