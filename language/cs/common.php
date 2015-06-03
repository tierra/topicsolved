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
	'SEARCH_UNSOLVED' => 'Hledat nevyřešená témata',
	'SEARCH_YOUR_UNSOLVED' => 'Hledat vaše nevyřešená témata',
	'SEARCH_SOLVED' => 'Hledat ve vyřešených tématech',
	'TOPIC_SOLVED' => 'Vyřešeno',
	'SET_TOPIC_SOLVED' => 'Označit téma jako vyřešené',
	'SET_TOPIC_NOT_SOLVED' => 'Zrušit označení tématu jako vyřešené',
	'BAD_METHOD_CALL' => 'Chyba „%s“.',
	'FORBIDDEN_MARK_SOLVED' => 'Nemáte oprávnění označovat témata jako vyřešená.',
	'TOPIC_ALREADY_SOLVED' => 'Téma už je označeno jako vyřešené.',
	'TOPIC_ALREADY_UNSOLVED' => 'Téma už je označeno jako nevyřešené.',
));
