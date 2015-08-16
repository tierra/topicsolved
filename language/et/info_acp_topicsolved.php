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
	'ALLOW_SOLVE'                => 'Luba teemasi märkida lahendatuks',
	'ALLOW_SOLVE_EXPLAIN'        => 'Anna teema algatajale või moderaatoritele õigus märkida teema lahendatuks.',
	'ALLOW_UNSOLVE'              => 'Luba teemasi uuesti avada',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Anna teema algatajale või moderaatoritele õigus märkida teema tagasi mitte lahendatuks.',
	'LOCK_SOLVED'                => 'Sulge lahendatud teemad',
	'LOCK_SOLVED_EXPLAIN'        => 'Pane tähele, et ainult moderaatorid saavad taas avada teemasi.',
	'TOPIC_SOLVED_SETTINGS'      => 'Teema lahendatud seaded',
	'FORUM_SOLVE_TEXT'           => 'Vali tekst selle asemel, et kasutada lahendatud pilti',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Sul on võimalik valida pildi asemele teksti. Näiteks [LAHENDATUD] või [MÜÜDUD] või midagi muud. Jäta see tühjaks, et kasutada "Teema lahendatud" pilti.',
	'FORUM_SOLVE_COLOUR'         => 'Tekstivärv',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Vali tekstivärv. Jäta tühjaks, et kasutada vaikimisi väärtust.',
	'YES_MOD'                    => 'Jah, moderaator',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Teema on lahendatud',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Teema on lahendatud',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Teema on lahendatud',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Nõustu selle vastusega',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Märgi teema kui mitte lahendatuks',
));
