<?php
/**
 * Main layout
 *
 * @var $this YdWebController
 * @var $content
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-skeleton/master/license.txt
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="language" content="en"/>
    <?php
    // init widgets
    $this->widget('dressing.widgets.YdModal');
    $this->widget('dressing.widgets.YdFancyBox');
    $this->widget('dressing.widgets.YdQTip');
    // dressing styles
    $cs = $app->clientScript;
    $cs->registerCSSFile($app->dressing->getAssetsUrl() . '/css/yii-dressing.css');
    // app style/script
    $cs->registerCSSFile(au() . '/css/app.css', 'screen, projection');
    $cs->registerScriptFile(au() . '/js/app.js');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body id="top" class="<?php echo $this->id . '-' . $this->action->id; ?>">

<?php echo $content; ?>

</body>
</html>
