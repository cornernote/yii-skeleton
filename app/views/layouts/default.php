<?php
/**
 * Default layout
 *
 * This layout will load a layout based on the type of request.
 * - ajax requests will load ajax.php
 * - all other requests will load _content.php wrapped in main.php
 *
 * @var $this YdWebController
 * @var $content
 */

if (Yii::app()->request->isAjaxRequest) {
    $this->beginContent('//layouts/ajax');
    echo user()->multiFlash();
    echo $content;
    $this->endContent();
}
else {
    $this->beginContent('//layouts/main');
    $this->renderPartial('//layouts/_content', array('content' => $content));
    $this->endContent();
}
