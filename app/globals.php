<?php
/**
 * Global Helpers
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Debug your variables in the coolest way possible
 *
 * @param $var
 * @param string $name
 */
function debug($var, $name = '')
{
    $bt = debug_backtrace();
    $file = str_ireplace(dirname(dirname(__FILE__)), '', $bt[0]['file']);
    print '<div style="background: #FFFBD6">';
    $nameLine = $name ? '<b> <span style="font-size:18px;">' . $name . '</span></b> printr:<br/>' : '';
    print '<span style="font-size:12px;">' . $nameLine . ' ' . $file . ' on line ' . $bt[0]['line'] . '</span>';
    print '<div style="border:1px solid #000;">';
    print '<pre>';
    if (is_scalar($var))
        var_dump($var);
    elseif (class_exists('CActiveRecord', false) && $var instanceof CActiveRecord)
        print_r($var->attributes);
    else
        print_r($var);
    print '</pre></div></div>';
}

/**
 * Shortcut to Yii::app()
 *
 * @return Application
 */
function app()
{
    return Yii::app();
}

/**
 * Shortcut to Yii::app()->db
 *
 * @return CDbConnection
 */
function db()
{
    return Yii::app()->getDb();
}

/**
 * Shortcut to Yii::app()->cache
 *
 * @param string $cache mem|file|db
 * @return CCache
 */
function cache($cache = null)
{
    if ($cache == 'file')
        $cache = 'cacheFile';
    elseif ($cache == 'db')
        $cache = 'cacheDb';
    else
        $cache = 'cache';
    return Yii::app()->$cache;
}

/**
 * Gets the named application parameter.
 * Shortcut to Yii::app()->params[$name].
 *
 * @param $name
 * @return bool
 */
function param($name)
{
    return isset(Yii::app()->params[$name]) ? Yii::app()->params[$name] : null;
}


/**
 * Shortcut to Yii::app()->clientScript
 *
 * @return YdClientScript
 */
function cs()
{
    return Yii::app()->getClientScript();
}

/**
 * Shortcut to Yii::app()->user
 *
 * @return YdWebUser
 */
function user()
{
    return Yii::app()->getUser();
}

/**
 * HTTP Request
 *
 * @return CHttpRequest
 */
function request()
{
    return Yii::app()->getRequest();
}

/**
 * Shortcut to Yii::app()->email
 *
 * @return YdEmail
 */
function email()
{
    return Yii::app()->email;
}

/**
 * @return YdReturnUrl
 */
function returnUrl()
{
    return Yii::app()->returnUrl;
}

/**
 * URL
 * eg: url('/example/view', array('id' => $model->id);
 *
 * @param $route
 * @param array $params
 * @param string $ampersand
 * @return string
 */
function url($route, $params = array(), $ampersand = '&')
{
    if (is_array($route)) {
        $params = CMap::mergeArray($route, $params);
        $route = array_shift($params);
    }
    return Yii::app()->createUrl($route, $params, $ampersand);
}

/**
 * Absolute URL
 * eg: absoluteUrl('/example/view', array('id' => $model->id);
 *
 * @param $route
 * @param array $params
 * @param string $schema
 * @param string $ampersand
 * @return string
 */
function absoluteUrl($route, $params = array(), $schema = '', $ampersand = '&')
{
    if (is_array($route)) {
        $params = CMap::mergeArray($route, $params);
        $route = array_shift($params);
    }
    return Yii::app()->createAbsoluteUrl($route, $params, $schema, $ampersand);
}

/**
 * Parse Url
 *
 * @param $url
 * @return string
 */
function parseUrl($url)
{
    return Yii::app()->getUrlManager()->parseUrl($url);
}

/**
 * Link
 * eg: echo l(t('click here'), array('/example/view', 'id' => $this->id));
 *
 * @param $text
 * @param string $url
 * @param array $htmlOptions
 * @return string
 */
function l($text, $url = '#', $htmlOptions = array())
{
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * Image
 *
 * @param $image
 * @param string $alt
 * @param array $htmlOptions
 * @return string
 */
function i($image, $alt = '', $htmlOptions = array())
{
    return CHtml::image($image, $alt, $htmlOptions);
}

/**
 * Translate
 *
 * @param $message
 * @param array $params
 * @param null $source
 * @param null $language
 * @return string
 */
function t($message, $params = array(), $source = null, $language = null)
{
    return Yii::t('app', $message, $params, $source, $language);
}

/**
 * HTML Encode
 *
 * @param $text
 * @return string
 */
function h($text)
{
    return htmlspecialchars($text, ENT_QUOTES, Yii::app()->charset);
}

/**
 * Request Uri
 *
 * @return string
 */
function ru()
{
    return Yii::app()->getRequest()->getRequestUri();
}

/**
 * Base Url
 *
 * @param bool $absolute
 * @return string
 */
function bu($absolute = false)
{
    return Yii::app()->getBaseUrl($absolute);
}

/**
 * Base Path
 *
 * @return string
 */
function bp()
{
    return Yii::app()->getBasePath();
}

/**
 * Assets Url
 *
 * @return string
 */
function au()
{
    return Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.assets'), false, 1, YII_DEBUG);
}

/**
 * Vendor Path
 *
 * @return string
 */
function vp()
{
    return Yii::getPathOfAlias('vendor');
}

/**
 * Public Path
 *
 * @return string
 */
function pp()
{
    return Yii::getPathOfAlias('public');
}

/**
 * Submitted Field
 * Shortcut to YdHelper::getSubmittedField
 *
 * @param $field
 * @param null $model
 * @return null
 */
function sf($field, $model = null)
{
    return YdHelper::getSubmittedField($field, $model);
}

/**
 * Safe Index
 * Returns the a key in an array if it is set, otherwise returns null.
 *
 * @param $array
 * @param $index
 * @return mixed
 */
function si($array, $index)
{
    return isset($array[$index]) ? $array[$index] : null;
}

/**
 * Value or Default
 * Returns the a value if it is set, otherwise returns the default.
 *
 * @param $value
 * @param $default
 * @return mixed
 */
function vd(&$value, $default = null)
{
    return isset($value) ? $value : $default;
}
