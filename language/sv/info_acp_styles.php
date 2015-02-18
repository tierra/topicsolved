<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 * Swedish translation by Holger (www.maskinisten.net)
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
	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Ämnet har lösts',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Ämnet har lösts',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Ämnet har lösts',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Välj svar som lösning',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Markera ämnet som olöst',
));
