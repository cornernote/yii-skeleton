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
 * Shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

/**
 * Debug your variables in the coolest way possible
 *
 * @param $var
 * @param string $name
 */
function debug($var, $name = '')
{
    $bt = debug_backtrace();
    $file = str_replace(bp(), '', $bt[0]['file']);
    print '<div style="background: #FFFBD6">';
    $nameLine = $name ? '<b> <span style="font-size:18px;">' . $name . '</span></b> printr:<br/>' : '';
    print '<span style="font-size:12px;">' . $nameLine . ' ' . $file . ' on line ' . $bt[0]['line'] . '</span>';
    print '<div style="border:1px solid #000;">';
    print '<pre>';
    if (is_scalar($var))
        var_dump($var);
    elseif ($var instanceof CActiveRecord)
        print_r($var->attributes);
    else
        print_r($var);
    print '</pre></div></div>';
}

/**
 * Shortcut to Yii::app()
 *
 * @return WebApplication
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
 * HTTP Request
 *
 * @return CHttpRequest
 */
function request()
{
    return Yii::app()->getRequest();
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
 * Base Url
 *
 * @return string
 */
function bu()
{
    return Yii::app()->getRequest()->getBaseUrl();
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
    return Yii::app()->getAssetManager()->publish(ap(), false, 1, YII_DEBUG);
}

/**
 * Assets Path
 *
 * @return string
 */
function ap()
{
    return Yii::getPathOfAlias('application.assets');
}

/**
 * Vendors Path
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
 * Gets the named application parameter.
 * Shortcut to Yii::app()->params[$name].
 *
 * @param $name
 * @return bool
 */
function param($name)
{
    return isset(Yii::app()->params[$name]) ? Yii::app()->params[$name] : false;
}

/**
 * Shortcut to Yii::app()->cache
 *
 * @param string $cache mem|file
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
 * Shortcut to Yii::app()->format
 *
 * @return CFormatter
 */
function format()
{
    return Yii::app()->format;
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

/**
 * Is this an AJAX request
 *
 * @return bool
 */
function isAjax()
{
    return Yii::app()->getRequest()->getIsAjaxRequest();
}

/**
 * Is this a Post request
 *
 * @return bool
 */
function isPost()
{
    return Yii::app()->getRequest()->getIsPostRequest();
}

/**
 * Is this a CLI request
 *
 * @return bool
 */
function isCli()
{
    return YdHelper::isCli();
}

/**
 * Is this a Mobile request
 *
 * @return bool
 */
function isMobile()
{
    return YdHelper::isMobileBrowser();
}

/**
 * Is this a Front Page request
 *
 * @return bool
 */
function isFront()
{
    return YdHelper::isFrontPage();
}
