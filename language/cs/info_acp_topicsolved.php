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
	'ALLOW_SOLVE'                => 'Umožňuje označování témat jako vyřešená',
	'ALLOW_SOLVE_EXPLAIN'        => 'Dává pravomoc zakladatelům témat nebo moderátorům označovat témata jako vyřešená.',
	'ALLOW_UNSOLVE'              => 'Umožňuje označování témat jako nevyřešená',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Dává pravomoc zakladatelům témat nebo moderátorům označovat témata jako nevyřešená.',
	'LOCK_SOLVED'                => 'Uzamknout vyřešená témata',
	'LOCK_SOLVED_EXPLAIN'        => 'Pouze moderátoři mohou odemykat uzamknutá témata.',
	'TOPIC_SOLVED_SETTINGS'      => 'Nastavení vyřešených témat',
	'FORUM_SOLVE_TEXT'           => 'Zvolte text, zobrazený místo obrázku u vyřešeného tématu',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Místo obrázku můžete použít textové označení vyřešeného tématu. Například [VYŘEŠENO] nebo [PRODÁNO] nebo něco jiného. Nechte prázdné pro použití obrázků.',
	'FORUM_SOLVE_COLOUR'         => 'Barva textu',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Vyberte barvu textu. Nechte prázdné pro použití výchozí barvy textu.',
	'YES_MOD'                    => 'Ano, moderátor',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Téma je vyřešené',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Téma je vyřešené',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Téma je vyřešené',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Nastavit tento příspěvek jako řešení tématu',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Zrušit označení tématu jako vyřešené',
));
