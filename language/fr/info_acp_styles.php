<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 * French translation by zouloufr
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
	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Sujet résolu',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Sujet résolu',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Résolu',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Accepter cette réponse',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Marquer ce sujet comme non résolu',
));
