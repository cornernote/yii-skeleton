<?php
/**
 * @var $this WebController
 * @var $content string
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-skeleton/master/license.txt
 */

$this->widget('widgets.Navbar', array(
    'id' => 'navbar',
    //'fixed' => 'top',
    'fluid' => true,
    'collapse' => true,
    'items' => SiteMenu::topMenu(),
    'constantItems' => array(
        SiteMenu::userMenu(),
    ),
));

echo '<div class="holder">';

echo '<div class="container-fluid">';

if ($this->pageHeading) {
    echo '<h1 class="header">' . $this->pageHeading . '</h1>';
}
if (!app()->request->isAjaxRequest) {
    echo '<div id="content">';
}

if ($this->menu) {
    $this->widget('bootstrap.widgets.TbMenu', array(
        'id' => 'menu',
        'type' => 'tabs',
        'items' => $this->menu,
    ));
}
if (!app()->request->isAjaxRequest) {
    echo '<div id="inner">';
}
if ($this->breadcrumbs) {
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'htmlOptions' => array(
            'id' => 'breadcrumbs',
        ),
        'separator' => '',
        'links' => $this->breadcrumbs,
    ));
}

echo Yii::app()->user->multiFlash();
echo $content;
if (!app()->request->isAjaxRequest) {
    echo '</div>';
    echo '</div>';
}
echo '</div>';

echo '<footer class="footer">';
echo '<div class="container-fluid">';
$this->renderPartial('audit.views.request._footer');
echo '<p class="pull-right">' . l(t('Back to Top') . ' &uarr;', '#') . '</p>';
echo '</div>';
echo '</footer>';

echo '</div>';
