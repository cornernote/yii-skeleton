<?php
/**
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license https://raw.github.com/cornernote/yii-skeleton/master/license.txt
 */
$assetPath = app()->theme->basePath . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR;
$assetUrl = app()->getAssetManager()->publish($assetPath, false, 1, YII_DEBUG);

// register css file
cs()->registerCSSFile($assetUrl . '/css/style.css', 'screen, projection', array('order' => 5));