<?php
/**
 * @var $this WebController
 * @var $content string
 */

if ($this->showNavBar) {
    $this->widget('bootstrap.widgets.TbNavbar', array(
        //'fixed' => 'top',
        'fluid' => true,
        'collapse' => true,
        'items' => SiteMenu::topMenu(),
    ));
}
?>

<div id="wrapper">
    <?php
    if ($this->pageHeading || $this->breadcrumbs || $this->menu) {
        ?>
        <header id="header">
            <div class="container-fluid">
                <?php
                if ($this->pageHeading) {
                    echo '<h1>' . ($this->pageIcon ? '<i class="' . $this->pageIcon . '"></i> ' : '') . $this->pageHeading . '</h1>';
                }
                if ($this->breadcrumbs) {
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links' => CMap::mergeArray($this->breadcrumbs, array($this->pageHeading)),
                        'separator' => '<i class="icon-chevron-right"></i>',
                        //'htmlOptions' => array('class' => 'pull-right'),
                    ));
                }
                if ($this->menu) {
                    $this->widget('bootstrap.widgets.TbMenu', array(
                        'id' => 'menu',
                        'type' => 'tabs',
                        'items' => $this->menu,
                    ));
                }
                ?>
            </div>
        </header>
    <?php
    }
    ?>

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
