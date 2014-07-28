<?php
/**
 * @var $this WebController
 * @var $content string
 */

if (!empty($this->showNavBar)) {
    $this->widget('bootstrap.widgets.TbNavbar', array(
        //'fixed' => 'top',
        'fluid' => true,
        'collapse' => true,
        'items' => SiteMenu::topMenu(),
    ));
}
?>

<div id="wrapper">

    <header id="header">
        <?php
        if (!empty($this->pageHeading) || !empty($this->breadcrumbs) || !empty($this->menu)) {
            ?>
            <div class="container-fluid">
                <?php
                if (!empty($this->pageHeading)) {
                    echo '<h1>' . (!empty($this->pageIcon) ? '<i class="fa fa-' . $this->pageIcon . '"></i> ' : '') . $this->pageHeading . '</h1>';
                }
                if (!empty($this->breadcrumbs)) {
                    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                        'links' => CMap::mergeArray($this->breadcrumbs, array($this->pageHeading)),
                        'divider' => '<i class="icon-chevron-right"></i>',
                        //'htmlOptions' => array('class' => 'pull-right'),
                    ));
                }
                if (!empty($this->menu)) {
                    $this->widget('bootstrap.widgets.TbNav', array(
                        'id' => 'menu',
                        'type' => TbHtml::NAV_TYPE_TABS,
                        'items' => $this->menu,
                    ));
                }
                ?>
            </div>
        <?php
        }
        ?>
    </header>

    <div id="content" class="container-fluid">
        <?php
        echo Yii::app()->user->multiFlash();
        echo $content;
        ?>
    </div>

    <footer id="footer">
        <div class="container-fluid">
            <p><?php echo '&copy; ' . date('Y') . ' ' . app()->name; ?>

                <?php $this->renderPartial('audit.views.request.__footer'); ?>
                <span id="totop" class="pull-right"><a href="#">Back to Top
                        <i class="icon-arrow-up"></i></a></span>
            </p>
        </div>
    </footer>

</div>
