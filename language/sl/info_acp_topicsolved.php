<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/language
 * Slovenian Translation - Marko K.(max, max-ima,...)* Slovenian Translation - Marko K.(max, max-ima,...)
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
	'ALLOW_SOLVE'                => 'Dovoli, da se teme označijo kot rešene',
	'ALLOW_SOLVE_EXPLAIN'        => 'Dajte začetnikom ali moderatorjem teme možnost, da temo nastavijo kot rešeno. Moderatorji lahko rešujejo teme v obeh da-možnostih.',
	'ALLOW_UNSOLVE'              => 'Dovoli ponovno odpiranje tem',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Dajte uporabnikom ali moderatorjem možnost, da temo vrnejo kot nerešeno. Moderatorji lahko razrešijo teme v obeh da-možnostih.',
	'LOCK_SOLVED'                => 'Zakleni rešene teme',
	'LOCK_SOLVED_EXPLAIN'        => 'Upoštevajte, da lahko samo moderatorji znova odprejo zaklenjene teme.',
	'TOPIC_SOLVED_SETTINGS'      => 'Tema rešena nastavitve',
	'FORUM_SOLVE_TEXT'           => 'Izberite besedilo namesto rešene slike',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Namesto lepe slike rešene teme lahko imate nekaj besedila. Npr. [REŠENO] ali [PRODANO] ali kaj drugega. Pustite prazno, če želite uporabiti sliko rešene teme.',
	'FORUM_SOLVE_COLOUR'         => 'Barva za besedilo',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Izberite barvo za besedilo. Pustite prazno, da uporabite privzeto barvo.',
	'YES_MOD'                    => 'Ja, moderator',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Tema je rešena',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Tema je rešena',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Tema je rešena',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Accept this answer',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Označi temo kot nerešeno',
));
