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
	'ALLOW_SOLVE'                => 'Salli viestiketjujen merkitseminen ratkaistuksi tai ratkaisemattomaksi',
	'ALLOW_SOLVE_EXPLAIN'        => 'Antaa viestiketjun aloittajalle tai valvojille mahdollisuuden merkitä viestiketju ratkaistuksi. Valvojat voivat ratkaista viestiketjuja kummassakin kyllä-vaihtoehdossa.',
	'ALLOW_UNSOLVE'              => 'Salli viestiketjujen uudelleenavaus',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Antaa käyttäjille tai valvojille mahdollisuuden siirtää viestiketjun ratkaisemattomaksi. Valvojat voivat siirtää viestiketjun ratkaisemattomaksi kummassakin kyllä-vaihtoehdossa.',
	'LOCK_SOLVED'                => 'Lukitse ratkaistut viestiketjut',
	'LOCK_SOLVED_EXPLAIN'        => 'Huomaa, että vain valvojat voivat avata lukitut viestiketjut.',
	'TOPIC_SOLVED_SETTINGS'      => 'Viestiketjujen ratkaisemisen asetukset',
	'FORUM_SOLVE_TEXT'           => 'Valitse teksti ratkaistu-kuvakkeen sijaan',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Voit käyttää myös tekstiä ratkaistu-kuvakkeen sijaan, esimerkiksi [RATKAISTU] tai jotain muuta vastaavaa. Jätä tämä kenttä tyhjäksi käyttääksesi kuvaketta..',
	'FORUM_SOLVE_COLOUR'         => 'Tekstin väri',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Valitse tekstin väri. Jätä tyhjäksi käyttääksesi oletusväriä.',
	'YES_MOD'                    => 'Kyllä, valvojat',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Viestiketju on ratkaistu',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Viestiketju on ratkaistu',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Viestiketju on ratkaistu',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Hyväksy tämä vastaus',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Merkitse tämä viestiketju ratkaisemattomaksi',
));
