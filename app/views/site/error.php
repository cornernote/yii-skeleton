<?php
/**
 * @var SiteController $this
 * @var string $message
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-skeleton/master/license.txt
 */

$this->pageTitle = Yii::t('app', 'Error');

$this->widget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => t('Error'),
    'content' => '<p>' . CHtml::encode($message) . '</p>',
));

