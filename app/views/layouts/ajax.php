<?php
/**
 * Ajax layout
 *
 * @var $this YdWebController
 * @var $content
 */

if ($this->isModal) {
    echo '<div class="modal-header">';
    echo '<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>';
    echo '<h3>' . $this->pageHeading . '</h3>';
    echo '</div>';
}
else
    echo '<h3>' . $this->pageHeading . '</h3>';

echo $content;
