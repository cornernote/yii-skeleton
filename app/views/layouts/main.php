<?php
/**
 * Main layout
 *
 * @var $this YdWebController
 * @var $content
 */
?><!DOCTYPE html>
<html lang="<?php echo Yii::app()->language; ?>">
<head>
    <meta charset="<?php echo Yii::app()->charset; ?>">
    <meta name="language" content="<?php echo Yii::app()->language; ?>"/>
    <?php
    $cs = Yii::app()->clientScript;

    // widgets
    $this->widget('dressing.widgets.YdModal');
    $this->widget('dressing.widgets.YdFancyBox');
    $this->widget('dressing.widgets.YdQTip');

    // bootstrap
    Yii::app()->bootstrap->register();

    // dressing
    $cs->registerCSSFile(Yii::app()->dressing->getAssetsUrl() . '/css/yii-dressing.css');

    // app
    $cs->registerCSSFile(au() . '/css/app.css', 'screen, projection');
    $cs->registerScriptFile(au() . '/js/app.js');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body id="top" class="<?php echo $this->id . '-' . $this->action->id; ?>">

<?php echo $content; ?>

</body>
</html>
