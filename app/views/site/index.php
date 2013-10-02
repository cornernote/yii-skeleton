<?php
/**
 * @var $this SiteController
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Brett O'Donnell <cornernote@gmail.com>, Zain Ul abidin <zainengineer@gmail.com>
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */

$this->pageTitle = $this->pageHeading = Yii::app()->name;

echo '<p>You may change the content of this page by modifying the file <code>' . __FILE__ . '</code>.</p>';
if (!YdHelper::tableExists('migration')) {
    echo '<p>To install the database run:</p>';
    echo '<pre>';
    $win = YdHelper::isWindowsServer();
    echo ($win ? 'copy' : 'cp') . ' ' . Yii::getPathOfAlias('dressing') . DS . 'migrations' . DS . '*' . ($win ? '.*' : '') . ' ' . Yii::getPathOfAlias('application') . DS . 'migrations' . "\n";
    echo Yii::getPathOfAlias('core') . DS . 'bin' . DS . 'yiic migrate' . "\n";
    echo '</pre>';
}


