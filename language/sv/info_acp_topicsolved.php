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
	'ALLOW_SOLVE'                => 'Tillåt att ämnen markeras som lösta',
	'ALLOW_SOLVE_EXPLAIN'        => 'Tillåter trådstartare och moderatorer att markera ett ämne som löst. Moderatorer kan markera ämnen med bägge Ja-inställningarna.',
	'ALLOW_UNSOLVE'              => 'Tillåt att ämnen åter öppnas',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Tillåter trådstartaren och moderatorer att återställa ämnet till olöst. Moderatorer kan återtälla ämnen till olöst med bägge Ja-inställningarna.',
	'LOCK_SOLVED'                => 'Lås lösta ämnen',
	'LOCK_SOLVED_EXPLAIN'        => 'Observera att endast moderatorer kan öppna låsta ämnen.',
	'TOPIC_SOLVED_SETTINGS'      => 'Inställningar för lösta ämnen',
	'FORUM_SOLVE_TEXT'           => 'Välj text istället för löst-grafik',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Du kan använda text istället för löst-grafiken. T.ex. [LÖST] eller [SÅLD] eller något annat. Lämna tomt för att använda grafiken.',
	'FORUM_SOLVE_COLOUR'         => 'Textfärg',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Välj textfärg. Lämna tomt för att använda standardfärgen.',
	'YES_MOD'                    => 'Ja, moderator',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Ämnet har lösts',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Ämnet har lösts',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Ämnet har lösts',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Välj svar som lösning',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Markera ämnet som olöst',
));
