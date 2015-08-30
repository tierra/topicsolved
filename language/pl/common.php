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
	'SEARCH_UNSOLVED' => 'Wyświetl tematy nierozwiązane',
	'SEARCH_YOUR_UNSOLVED' => 'Wyświetl twoje tematy nierozwiązane',
	'SEARCH_SOLVED' => 'Szukaj tylko w tematach rozwiązanych',
	'TOPIC_SOLVED' => 'Temat rozwiązany',
	'SET_TOPIC_SOLVED' => 'Zaakceptuj tę odpowiedź',
	'SET_TOPIC_NOT_SOLVED' => 'Ustaw temat jako nierozwiązany',
	'BAD_METHOD_CALL' => 'Niewłaściwa wartość dla `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'Nie masz uprawnień, aby oznaczyć ten temat jako rozwiązany lub nierozwiązany.',
	'TOPIC_ALREADY_SOLVED' => 'Temat jest już oznaczony jako rozwiązany.',
	'TOPIC_ALREADY_UNSOLVED' => 'Temat jest już oznaczony jako nierozwiązany.',
));
