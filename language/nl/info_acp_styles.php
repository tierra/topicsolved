<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 * [Dutch] translated by Dutch Translators (https://github.com/dutch-translators)
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
	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Onderwerp is opgelost',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Onderwerp is opgelost',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Onderwerp is opgelost',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Accepteer dit antwoord',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Markeer topic als onopgelost',
));
