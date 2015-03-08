<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/language
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Konu Çözüldü',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Konu Çözüldü',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Konu Çözüldü',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Bu cevabı kabul et',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Konuyu çözülmedi olarak işaretle',
));
