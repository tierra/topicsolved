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
	'ALLOW_SOLVE'                => 'Markeer onderwerp als opgelost',
	'ALLOW_SOLVE_EXPLAIN'        => 'Geef onderwerp starters of moderators de mogelijkheid om een onderwerp als opgelost te markeren. Moderators kunnen bij beide ja-opties het onderwerp als opgelost markeren.',
	'ALLOW_UNSOLVE'              => 'Onderwerpen heropenen als onopgelost',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Geef gebruikers en moderators de mogelijkheid om een onderwerp terug als onopgelost te markeren. Moderators kunnen bij beide ja-opties het onderwerp als onopgelost markeren.',
	'LOCK_SOLVED'                => 'Opgeloste onderwerpen sluiten',
	'LOCK_SOLVED_EXPLAIN'        => 'LET OP: Alleen moderators kunnen gesloten onderwerpen heropenen.',
	'TOPIC_SOLVED_SETTINGS'      => 'Onderwerp opgelost instellingen',
	'FORUM_SOLVE_TEXT'           => 'Kies een tekst inplaats van de solved-afbeelding',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Je kan hier een tekst opgeven inplaats van de solved afbeelding. Bijv: [OPGELOST] of [VERKOCHT] of iets anders. Laat dit veld leeg om de solved afbeelding te gebruiken.',
	'FORUM_SOLVE_COLOUR'         => 'Kleur van de tekst',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Kies hier een kleur voor je tekst, als je dit veld leeg laat wordt de standaard kleur gebruikt.',
	'YES_MOD'                    => 'Ja, alleen door moderators',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Onderwerp is opgelost',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Onderwerp is opgelost',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Onderwerp is opgelost',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Accepteer dit antwoord',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Markeer topic als onopgelost',
));
