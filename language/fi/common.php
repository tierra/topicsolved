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
	'SEARCH_UNSOLVED' => 'Näytä ratkaisemattomat viestiketjut',
	'SEARCH_YOUR_UNSOLVED' => 'Näytä minun ratkaisemattomat viestiketjut',
	'SEARCH_SOLVED' => 'Hae vain ratkaistuista aiheista',
	'TOPIC_SOLVED' => 'Aihe on ratkaistu',
	'SET_TOPIC_SOLVED' => 'Hyväksy tämä ratkaisuksi',
	'SET_TOPIC_NOT_SOLVED' => 'Aseta viestiketju ratkaisemattomaksi',
	'BAD_METHOD_CALL' => 'Virheellinen parametri funktiolle `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'Sinulla ei ole oikeutta merkitä tätä viestiketjua ratkaistuksi tai ratkaisemattomaksi.',
	'TOPIC_ALREADY_SOLVED' => 'Viestiketju on jo merkitty ratkaistuksi.',
	'TOPIC_ALREADY_UNSOLVED' => 'Viestiketju on jo merkitty ratkaisemattomaksi.',
));
