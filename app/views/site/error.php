<?php
/**
 * @var SiteController $this
 * @var string $message
 */

$this->pageTitle = Yii::t('app', 'Error');

$this->widget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => t('Error'),
    'content' => '<p>' . CHtml::encode($message) . '</p>',
));

