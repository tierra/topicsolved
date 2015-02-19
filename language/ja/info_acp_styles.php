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
	'IMG_ICON_TOPIC_SOLVED_HEAD'    => '解決済',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => '解決済',
	'IMG_ICON_TOPIC_SOLVED_POST'    => '解決済',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'この回答を受け入れる',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'トピックを未解決としてマーク',
));
