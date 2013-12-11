<?php
/**
 * @var $this SiteController
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-skeleton/master/license.txt
 */

$this->pageTitle = t('Error');

$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => t('Error'),
));
echo '<p>' . CHtml::encode($message) . '</p>';
$this->endWidget();
