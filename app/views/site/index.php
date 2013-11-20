<?php
/**
 * @var $this SiteController
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
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

echo '<div class="row-fluid" id="home-menu">';
$menus = SiteMenu::getItemsFromMenu('Main');
foreach ($menus as $menu) {
    if (empty($menu['items']))
        continue;
    echo '<div class="span2">';
    $id = 'homemenu-heading-' . strtolower($menu['label']);
    echo '<h1 id="' . $id . '">' . $menu['label'] . '</h1>';
    $this->widget('dressing.widgets.YdHomeMenu', array(
        'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
        'stacked' => true,
        'items' => $menu['items'],
    ));
    echo '</div>';
}
echo '</div>';
