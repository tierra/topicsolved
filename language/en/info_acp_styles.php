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
	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Topic is solved',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Topic is solved',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Topic is solved',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Accept this answer',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Mark topic as not solved',
));
