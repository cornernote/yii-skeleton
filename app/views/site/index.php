<?php
/**
 * @var $this SiteController
 */

$this->pageTitle = $this->pageHeading = Yii::app()->name;

echo '<p>You may change the content of this page by modifying the file <code>' . __FILE__ . '</code>.</p>';
if (!YdHelper::tableExists('migration')) {
    echo '<p>To install the database run <code>' . Yii::getPathOfAlias('core') . DS . 'bin' . DS . 'yiic migrate</code>.</p>';
}


