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
	'ALLOW_SOLVE'                => 'Разрешить отмечать темы решенными',
	'ALLOW_SOLVE_EXPLAIN'        => 'Дать автору темы или модератору отмечать тему решенной. Модераторы могут отмечать темы как решенные даже в случае если обе опции выставлены в состояние "Да".',
	'ALLOW_UNSOLVE'              => 'Разрешить заного открывать решенные темы',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Дать пользователю или модератору отмечать тему нерешенной. Модераторы могут отмечать темы как нерешенные даже в случае если обе опции выставлены в состояние "Да".',
	'LOCK_SOLVED'                => 'Закрыть решенную тему',
	'LOCK_SOLVED_EXPLAIN'        => 'Только модератор сможет заново открыть закрытую тему.',
	'TOPIC_SOLVED_SETTINGS'      => 'Настройки расширения "Тема решена"',
	'FORUM_SOLVE_TEXT'           => 'Введите текст который будет отображаться вместо изображения',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Вы можете ввести здесь текст который будет выводиться вместо изображения. Например [РЕШЕНО] или [ПРОДАНО] или на ваш выбор. Оставьте моле пустым что-бы вместо текста выводилось изображение.',
	'FORUM_SOLVE_COLOUR'         => 'Цвет для текста',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Выберите цвет для текста. Для выбора цвета по умолчанию оставьте поле пустым.',
	'YES_MOD'                    => 'Да, модератор',
));
