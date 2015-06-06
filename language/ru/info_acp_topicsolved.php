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
	'ALLOW_SOLVE'                => 'Разрешить отмечать темы решёнными',
	'ALLOW_SOLVE_EXPLAIN'        => 'Дать автору темы или модератору отмечать тему решённой. Модераторы могут отмечать темы как решённые даже в случае если обе опции выставлены в состояние "Да".',
	'ALLOW_UNSOLVE'              => 'Разрешить заново открывать решённые темы',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Дать пользователю или модератору отмечать тему нерешённой. Модераторы могут отмечать темы как нерешённые даже в случае если обе опции выставлены в состояние "Да".',
	'LOCK_SOLVED'                => 'Закрыть решённую тему',
	'LOCK_SOLVED_EXPLAIN'        => 'Только модератор сможет заново открыть закрытую тему.',
	'TOPIC_SOLVED_SETTINGS'      => 'Настройки расширения "Тема решена"',
	'FORUM_SOLVE_TEXT'           => 'Введите текст который будет отображаться вместо изображения',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Вы можете ввести здесь текст который будет выводиться вместо изображения. Например [РЕШЕНО] или [ПРОДАНО] или на ваш выбор. Оставьте моле пустым что-бы вместо текста выводилось изображение.',
	'FORUM_SOLVE_COLOUR'         => 'Цвет для текста',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Выберите цвет для текста. Для выбора цвета по умолчанию оставьте поле пустым.',
	'YES_MOD'                    => 'Да, модератор',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Тема решена',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Принять в качестве ответа',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Отметить тему как нерешённую',
));
