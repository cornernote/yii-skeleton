<?php
/**
 * @var $this YdWebController
 * @var $content string
 */

if ($this->showNavBar) {
    $this->widget('bootstrap.widgets.TbNavbar', array(
        'fixed' => 'top',
        'fluid' => true,
        'collapse' => true,
        'items' => YdSiteMenu::topMenu(),
    ));
}
?>

<div id="holder" class="content">
    <header>
        <?php
        if ($this->pageHeading || $this->breadcrumbs || $this->menu) {
            ?>
            <div id="header">
                <div class="container-fluid">
                    <h1><?php echo $this->pageIcon ? '<i class="' . $this->pageIcon . '"></i> ' : ''; ?><?php echo $this->pageHeading; ?></h1>
                    <?php
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
            </div>
        <?php
        }
        ?>
    </header>

    <div id="body" class="container-fluid">
        <?php
        echo user()->multiFlash();
        echo $content;
        ?>
    </div>

    <footer id="footer">
        <div id="copyright">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <p><?php echo '&copy; ' . date('Y') . ' ' . app()->name; ?>

                            <?php $this->renderPartial('dressing.views.audit._footer'); ?>
                            <span id="totop" class="pull-right"><a href="#">Back to Top
                                    <i class="icon-arrow-up"></i></a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
