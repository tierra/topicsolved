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
	'SEARCH_UNSOLVED' => 'Visa olösta ämnen',
	'SEARCH_YOUR_UNSOLVED' => 'Visa dina olösta ämnen',
	'SEARCH_SOLVED' => 'Sök endast inom lösta ämnen',
	'TOPIC_SOLVED' => 'Ämnet har lösts',
	'SET_TOPIC_SOLVED' => 'Välj detta svar som lösning',
	'SET_TOPIC_NOT_SOLVED' => 'Markera ämnet som olöst',
	'BAD_METHOD_CALL' => 'Ogiltigt argument till metoden "%s".',
	'FORBIDDEN_MARK_SOLVED' => 'Du är ej behörig att markera detta ämne som löst eller olöst.',
	'TOPIC_ALREADY_SOLVED' => 'Ämnet har redan markerats som löst.',
	'TOPIC_ALREADY_UNSOLVED' => 'Ämnet har redan markerats som olöst.',
));
