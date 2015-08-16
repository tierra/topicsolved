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
	'SEARCH_UNSOLVED' => 'Vaata mitte lahendatuid teemasi',
	'SEARCH_YOUR_UNSOLVED' => 'Vaata oma mitte lahendatuid teemasi',
	'SEARCH_SOLVED' => 'Otsi ainult lahendatud teemadest',
	'TOPIC_SOLVED' => 'Teema on lahendatud',
	'SET_TOPIC_SOLVED' => 'Nõustu selle vastusega',
	'SET_TOPIC_NOT_SOLVED' => 'Seadista teema, kui mitte lahendatud',
	'BAD_METHOD_CALL' => 'Vigane argumendi viis "%s".',
	'FORBIDDEN_MARK_SOLVED' => 'Sul ei ole õigusi märkida seda teemat lahendatuks või mitte lahendatuks.',
	'TOPIC_ALREADY_SOLVED' => 'Teema on juba märgitud lahendatuks.',
	'TOPIC_ALREADY_UNSOLVED' => 'Teema on juba märgitud mitte lahendatuks.',
));
