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
	'ALLOW_SOLVE'                => 'Pozwól określać tematy jako rozwiązane',
	'ALLOW_SOLVE_EXPLAIN'        => 'Daj możliwość ustawiania statusu tematu moderatorom.',
	'ALLOW_UNSOLVE'              => 'Pozwól na ponowne otwieranie tematów',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Daj możliwość zmieniania statusu tematu moderatorom.',
	'LOCK_SOLVED'                => 'Zamknij tematy rozwiązane',
	'LOCK_SOLVED_EXPLAIN'        => 'Tylko moderatorzy mogą ponownie otworzyć zamknięte tematy.',
	'TOPIC_SOLVED_SETTINGS'      => 'Ustawienia tematów rozwiązanych',
	'FORUM_SOLVE_TEXT'           => 'Wybierz tekst zamiast domyślnego obrazka',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Możesz ustawić własny tekst przy tematach rozwiązanych, zamiast domyślnego obrazka.',
	'FORUM_SOLVE_COLOUR'         => 'Wybierz kolor dla tekstu',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Wybierz kolor dla tekstu. Zostaw puste, aby użyć domyślnego koloru.',
	'YES_MOD'                    => 'Tak, moderator',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Temat rozwiązany',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Temat rozwiązany',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Temat rozwiązany',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Zaakceptuj tę odpowiedź',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Ustaw temat jako nierozwiązany',
));
