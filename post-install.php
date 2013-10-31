<?php
/**
 * CLI Installation Script
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */

if (!file_exists('runtime'))
	mkdir('runtime', 0777);

if (!file_exists('public/assets'))
	mkdir('public/assets', 0777);
