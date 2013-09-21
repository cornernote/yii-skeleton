<?php
/**
 * @var $this YdWebController
 */
$this->pageTitle = $this->pageHeading = t('Help');

// menu
$this->menu = YdMenu::getItemsFromMenu('Help');

// breadcrumbs
$this->breadcrumbs[] = t('Help');
