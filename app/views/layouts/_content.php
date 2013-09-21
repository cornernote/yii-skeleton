<?php
/**
 * @var $this YdWebController
 * @var $content
 */
?>
<?php
if ($this->showNavBar) {
    $this->widget('dressing.widgets.YdNavbar', array(
        'id' => 'navbar',
        'fixed' => 'top',
        'fluid' => true,
        'collapse' => true,
        'items' => YdMenu::topMenu(),
        'constantItems' => array(
            YdMenu::userMenu(),
        ),
    ));
}
?>
<div class="holder">
    <div id="body" class="container-fluid">
        <?php
        if ($this->pageHeading) {
            echo '<h1 class="header">' . $this->pageHeading . '</h1>';
        }
        if ($this->menu) {
            $this->widget('bootstrap.widgets.TbMenu', array(
                'id' => 'menu',
                'type' => 'tabs',
                'items' => $this->menu,
            ));
        }
        if ($this->breadcrumbs) {
            $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                'links' => $this->breadcrumbs,
                'separator' => '',
                'htmlOptions' => array(
                    'id' => 'breadcrumbs',
                ),
            ));
        }
        echo user()->multiFlash();
        echo $content;
        ?>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <?php
            $this->renderPartial('dressing.views.audit._footer');
            echo '<p class="pull-right">' . l(t('Back to Top') . ' &uarr;', '#') . '</p>';
            ?>
        </div>
    </footer>
</div>