<?php
/**
 * @var $this YdWebController
 * @var $content string
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-skeleton/master/license.txt
 */
?>

<?php
if ($this->showNavBar) {
    $this->widget('dressing.widgets.YdNavbar', array(
        'id' => 'navbar',
        'fixed' => 'top',
        //'fluid' => true,
        'collapse' => true,
        'items' => YdSiteMenu::topMenu(),
        'constantItems' => array(
            YdSiteMenu::userMenu(),
        ),
    ));
}
?>

<div id="holder" class="content">
    <header>
        <?php if (YdHelper::isFrontPage()) { ?>
            <div id="landing">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span8">
                            <h1><?php echo $this->pageIcon ? '<i class="' . $this->pageIcon . '"></i> ' : ''; ?><?php echo $this->pageHeading; ?></h1>
                            <br/>

                            <?php echo nl2br(t(YdConfig::setting('mission'))); ?>
                            <br/><br/>

                            <div class="buttons">
                                <?php
                                echo l(t('Get Started Free'), array('/account/signup'), array('class' => 'btn btn-primary btn-action', 'data-toggle' => 'modal-remote'));
                                echo ' ';
                                echo l(t('Plans and Pricing'), array('/site/page', 'view' => 'pricing'), array('class' => 'btn btn-action'));
                                ?>
                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $img = i(bu() . '/img/landing_video.png', t(YdConfig::setting('landingYoutubeTitle')));
                            if (YdHelper::isMobileBrowser()) {
                                echo l($img, 'http://youtu.be/' . YdConfig::setting('landingYoutube'), array(
                                    'class' => 'thumbnail',
                                ));
                            }
                            else {
                                echo l($img, '#landingYoutube', array(
                                    'data-toggle' => 'modal',
                                    'data-backdrop' => 'static',
                                    'data-keyboard' => 'false',
                                    'class' => 'thumbnail',
                                    'onclick' => 'youtubePlayer("playVideo");',
                                ));
                                ?>
                                <div id="landingYoutube" class="modal hide fade" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                                                onclick="youtubePlayer('pauseVideo');">×
                                        </button>
                                        <h3 id="myModalLabel"><?php echo t(YdConfig::setting('landingYoutubeTitle')) . '</small>'; ?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <iframe id="youtubeFrame" class="video" width="560" height="345"
                                                src="http://www.youtube.com/embed/<?php echo YdConfig::setting('landingYoutube'); ?>?enablejsapi=1"
                                                frameborder="0" class="pull-right" webkitAllowFullScreen
                                                mozallowfullscreen allowFullScreen></iframe>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        $this->beginWidget('dressing.widgets.YdJavaScriptWidget', array('position' => CClientScript::POS_HEAD));
        ?>
            <script type="text/javascript">
                function youtubePlayer(command) {
                    $('iframe[src*="http://www.youtube.com/embed/"]').each(function (i) {
                        this.contentWindow.postMessage('{"event":"command","func":"' + command + '","args":""}', '*');
                    });
                }
            </script>
            <?php
            $this->endWidget();
            ?>
        <?php
        }
        else if ($this->pageHeading || $this->menu) {
            ?>
            <div id="header">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h1><?php echo $this->pageIcon ? '<i class="' . $this->pageIcon . '"></i> ' : ''; ?><?php echo $this->pageHeading; ?></h1>
                        </div>
                    </div>
                    <?php
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

    <div id="body" class="container">
        <?php
        if ($this->breadcrumbs) {
            $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                'links' => $this->breadcrumbs,
                'separator' => '<i class="icon-chevron-right"></i>',
            ));
        }
        echo user()->multiFlash();
        echo $content;
        ?>
    </div>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <h3>Quick Links</h3>
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => YdSiteMenu::getItemsFromMenu('Main'),
                        'htmlOptions' => array(
                            'id' => 'menu',
                        ),
                    ));
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => YdSiteMenu::getItemsFromMenu('Help'),
                        'htmlOptions' => array(
                            'id' => 'menu',
                        ),
                    ));
                    ?>
                </div>
                <div class="span3">
                    <h3>Company</h3>
                    <ul>
                        <li><?php echo l(t('Privacy Policy'), array('/site/page', 'view' => 'privacy')) ?></li>
                        <li><?php echo l(t('Terms of Use'), array('/site/page', 'view' => 'terms')) ?></li>
                    </ul>
                </div>
                <div class="span3">
                    <h3>We're Social</h3>
                    <ul>
                        <li><a target="_blank" href="#">Facebook</a></li>
                        <li><a target="_blank" href="#">Twitter</a></li>
                        <li><a target="_blank" href="#">Linked in</a></li>
                        <li><a target="_blank" href="#">YouTube</a></li>
                    </ul>
                </div>
                <div class="span3">
                    <h3>Subscribe</h3>

                    <p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>

                    <form action="#">
                        <input type="email" value="" placeholder="Your Email"/>
                        <button class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>


        <div id="copywrite">
            <div class="container">
                <div class="row">
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
