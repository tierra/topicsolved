<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/language
 * Slovenian Translation - Marko K.(max, max-ima,...)
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
	'SEARCH_UNSOLVED' => 'Oglejte si nerešene teme',
	'SEARCH_YOUR_UNSOLVED' => 'Oglejte si svoje nerešene teme',
	'SEARCH_SOLVED' => 'Išči samo v rešenih temah',
	'TOPIC_SOLVED' => 'Tema je rešena',
	'SET_TOPIC_SOLVED' => 'Sprejmite ta odgovor',
	'SET_TOPIC_NOT_SOLVED' => 'Nastavi temo kot nerešeno',
	'BAD_METHOD_CALL' => 'Metodi `%1$s` je bil posredovan neveljaven argument.',
	'FORBIDDEN_MARK_SOLVED' => 'Te teme ni dovoljeno označiti kot rešeno ali nerešeno.',
	'TOPIC_ALREADY_SOLVED' => 'Tema je že označena kot rešena.',
	'TOPIC_ALREADY_UNSOLVED' => 'Tema je že označena kot nerešena.',
));
