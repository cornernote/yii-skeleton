<?php
/**
 * @var $this YdWebController
 * @var $content
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Brett O'Donnell <cornernote@gmail.com>, Zain Ul abidin <zainengineer@gmail.com>
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */
if (app()->request->isAjaxRequest) {
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
