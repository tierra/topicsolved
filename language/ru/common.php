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
	'SEARCH_UNSOLVED' => 'Просмотреть нерешённые темы',
	'SEARCH_YOUR_UNSOLVED' => 'Просмотреть ваши нерешённые темы',
	'SEARCH_SOLVED' => 'Искать только решённые темы',
	'TOPIC_SOLVED' => 'Тема решена',
	'SET_TOPIC_SOLVED' => 'Принять в качестве ответа',
	'SET_TOPIC_NOT_SOLVED' => 'Отметить тему как нерешённую',
	'BAD_METHOD_CALL' => 'Неверный аргумент "%s".',
	'FORBIDDEN_MARK_SOLVED' => 'Вам не разрешено отмечать тему решённой или нерешённой.',
	'TOPIC_ALREADY_SOLVED' => 'Тема уже помечена как решённая.',
	'TOPIC_ALREADY_UNSOLVED' => 'Тема уже отмечена как нерешённая.',
));
