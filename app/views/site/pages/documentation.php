<?php
/**
 * @var $this YdWebController
 */
$this->pageTitle = $this->pageHeading = t('Documentation');

// menu
$this->menu = YdMenu::getItemsFromMenu('Help');

// breadcrumbs
$this->breadcrumbs[t('Help')] = array('/site/page', 'view' => 'help');
$this->breadcrumbs[] = t('Documentation');

echo '<h2>' . t('Vendor Documentation') . '</h2>';
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false,
    'items' => array(
        array('label' => t('Yii'), 'url' => 'http://www.yiiframework.com/doc/'),
        array('label' => t('YiiExt'), 'url' => 'http://yiiext.github.io/'),
        array('label' => t('Yii Booster'), 'url' => 'http://yiibooster.clevertech.biz/'),
        array('label' => t('Yii Bootstrap'), 'url' => 'http://www.cniska.net/yii-bootstrap'),
        array('label' => t('Bootstrap'), 'url' => 'http://twitter.github.io/bootstrap/'),
        array('label' => t('jQuery'), 'url' => 'http://api.jquery.com/'),
        array('label' => t('Swift Mailer'), 'url' => 'http://swiftmailer.org/docs/introduction.html'),
        array('label' => t('Mustache PHP'), 'url' => 'https://github.com/bobthecow/mustache.php'),
        array('label' => t('Kint'), 'url' => 'http://raveren.github.io/kint/'),
        array('label' => t('Highcharts'), 'url' => 'http://api.highcharts.com/highcharts'),
    ),
));

