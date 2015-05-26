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
	'ALLOW_SOLVE'				=> 'Разрешить отмечать темы решёнными',
	'ALLOW_SOLVE_EXPLAIN'		=> 'Дать автору темы или только модератору отмечать тему решённой.',
	'ALLOW_UNSOLVE'				=> 'Разрешить отмечать решённые темы как нерешённые',
	'ALLOW_UNSOLVE_EXPLAIN'		=> 'Дать пользователю или только модератору отмечать тему нерешённой.',
	'LOCK_SOLVED'				=> 'Закрывать решённые темы',
	'LOCK_SOLVED_EXPLAIN'		=> 'При выставлении отметки темы как решенной, тема будет закрыта автоматически (Также доступно обратное действие, однако только модератор может открыть закрытую тему).',
	'TOPIC_SOLVED_SETTINGS'		=> 'Настройки расширения "Тема решена"',
	'FORUM_SOLVE_TEXT'			=> 'Введите текст который будет отображаться вместо изображения',
	'FORUM_SOLVE_TEXT_EXPLAIN'	=> 'Вы можете ввести здесь текст который будет выводиться вместо изображения. Например [РЕШЕНО], [ПРОДАНО] или на ваш выбор.',
	'FORUM_SOLVE_COLOR'			=> 'Цвет текста',
	'FORUM_SOLVE_COLOR_EXPLAIN'	=> 'Формат цвета html без использования #',
	'YES_MOD'					=> 'Да, модератор',

	'IMG_ICON_TOPIC_SOLVED_HEAD'	=> 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_LIST'	=> 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_POST'	=> 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_SET'		=> 'Принять в качестве ответа',
	'IMG_ICON_TOPIC_SOLVED_UNSET'	=> 'Отметить тему как нерешённую',
));
