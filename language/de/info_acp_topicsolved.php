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
	'ALLOW_SOLVE'                => 'Markieren von Themen als „gelöst“ erlauben',
	'ALLOW_SOLVE_EXPLAIN'        => 'Gibt Themenstarter oder Moderatoren die Möglichkeit ein Thema als gelöst markieren zu können. Moderatoren können diese Markierung bei beiden Ja-Optionen setzen.',
	'ALLOW_UNSOLVE'              => 'Markieren von Themen als „ungelöst“ erlauben',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Gibt Themenstarter oder Moderatoren die Möglichkeit ein Thema wieder als ungelöst markieren zu können. Moderatoren können diese Markierung bei beiden Ja-Optionen entfernen.',
	'LOCK_SOLVED'                => 'Sperre Themen die als „gelöst“ markiert wurden',
	'LOCK_SOLVED_EXPLAIN'        => 'Bitte beachte, das nur Moderatoren gesperrte Themen wieder entsperren können.',
	'TOPIC_SOLVED_SETTINGS'      => 'Einstellungen zu "Thema gelöst"',
	'FORUM_SOLVE_TEXT'           => 'Verwende Text anstelle der Gelöst-Grafik',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Du kannst einen kurzen Text eingeben, der anstelle der Gelöst-Grafik angezeigt wird. Als Beispiel etwa [GELÖST] oder [VERKAUFT] oder ähnliches. Lass dieses Feld leer, wenn die Gelöst-Grafik angezeigt werden soll.',
	'FORUM_SOLVE_COLOUR'         => 'Textfarbe',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Wähle eine Farbe für den Text. Lass dieses Feld leer, wenn die Standard Farbe verwendet werden soll.',
	'YES_MOD'                    => 'Ja, Moderatoren',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Thema ist als GELÖST markiert',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Thema ist als GELÖST markiert',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Thema ist als GELÖST markiert',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Markiere Beitrag als Lösung',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Markiere Thema als UNGELÖST',
));
