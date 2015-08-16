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
	'SEARCH_UNSOLVED' => 'Vis uløste emner',
	'SEARCH_YOUR_UNSOLVED' => 'Vis dine uløste emner',
	'SEARCH_SOLVED' => 'Søg kun blandt løste emner',
	'TOPIC_SOLVED' => 'Emnet er løst',
	'SET_TOPIC_SOLVED' => 'Acceptér dette svar',
	'SET_TOPIC_NOT_SOLVED' => 'Sæt emnet til ikke-løst',
	'BAD_METHOD_CALL' => 'Ugyldigt argument videregivet til metoden `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'Du har ikke tilladelse til at markere dette emne som løst eller ikke-løst.',
	'TOPIC_ALREADY_SOLVED' => 'Emnet er allerede markeret som løst.',
	'TOPIC_ALREADY_UNSOLVED' => 'Emnet er allerede markeret som ikke-løst.',
));
