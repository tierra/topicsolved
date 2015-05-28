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
	'SEARCH_UNSOLVED' => 'View unsolved topics',
	'SEARCH_YOUR_UNSOLVED' => 'View your unsolved topics',
	'SEARCH_SOLVED' => 'Search only in solved topics',
	'TOPIC_SOLVED' => 'Topic is solved',
	'SET_TOPIC_SOLVED' => 'Accept this answer',
	'SET_TOPIC_NOT_SOLVED' => 'Set topic as unsolved',
	'BAD_METHOD_CALL' => 'Invalid argument passed to method `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'You are not allowed to mark this topic as solved or unsolved.',
	'TOPIC_ALREADY_SOLVED' => 'Topic is already marked as solved.',
	'TOPIC_ALREADY_UNSOLVED' => 'Topic is already marked as unsolved.',
));
