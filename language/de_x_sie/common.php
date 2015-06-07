<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/language
 *
 * Deutsche Übersetzung von: Luke (www.wcsaga.org)
 *
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
	'SEARCH_UNSOLVED'		=> 'Zeigt Themen mit UNGELÖST-Markierung',
	'SEARCH_YOUR_UNSOLVED'		=> 'Zeigt Ihre Themen mit UNGELÖST-Markierung',
	'SEARCH_SOLVED'			=> 'Nur in Themen suchen mit GELÖST-Markierung',
	'TOPIC_SOLVED'			=> 'Thema ist als GELÖST markiert',
	'SET_TOPIC_SOLVED'		=> 'Markiere Beitrag als Lösung',
	'SET_TOPIC_NOT_SOLVED'		=> 'Markiere Thema als UNGELÖST',
	'BAD_METHOD_CALL'		=> 'Ungültiges Argument für die Methode "%s".',
	'FORBIDDEN_MARK_SOLVED'		=> 'Sie haben keine Berechtigung, um dieses Thema als GELÖST oder UNGELÖST markieren zu können.',
	'TOPIC_ALREADY_SOLVED'		=> 'Thema ist bereits als GELÖST markiert.',
	'TOPIC_ALREADY_UNSOLVED'	=> 'Thema ist bereits als UNGELÖST markiert.',
));
