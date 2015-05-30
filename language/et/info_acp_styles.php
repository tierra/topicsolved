<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty; Estonian translation by phpBBeesti.com 05/2015
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
	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Teema on lahendatud',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Teema on lahendatud',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Teema on lahendatud',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Nõustu selle vastusega',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Märgi teema kui mitte lahendatuks',
));
