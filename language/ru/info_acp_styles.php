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
	'IMG_ICON_TOPIC_SOLVED_HEAD'	=> 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_LIST'	=> 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_POST'	=> 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_SET'		=> 'Принять в качестве ответа',
	'IMG_ICON_TOPIC_SOLVED_UNSET'	=> 'Отметить тему как нерешённую',
));
