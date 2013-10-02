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

$this->pageTitle = t('Error');
//$this->pageHeading = t('Error');
//$this->breadcrumbs[] = t('Error');

$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => t('Error'),
));
echo '<p>' . CHtml::encode($message) . '</p>';
$this->endWidget();
