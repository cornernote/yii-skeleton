<?php
/**
 * @var $this YdWebController
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license https://raw.github.com/cornernote/yii-skeleton/master/license.txt
 */
$this->pageTitle = $this->pageHeading = t('Help');

// menu
$this->menu = YdMenu::getItemsFromMenu('Help');

// breadcrumbs
$this->breadcrumbs[] = t('Help');
