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
	'ALLOW_SOLVE'                => 'Autoriser les sujets à être marqués comme résolus ',
	'ALLOW_SOLVE_EXPLAIN'        => 'Permettre aux auteurs des sujets ou aux modérateurs de marquer les sujets comme étant résolus. Les deux options « Oui » autorisent les modérateurs.',
	'ALLOW_UNSOLVE'              => 'Autoriser la réouverture du sujet ',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Permettre aux auteurs des sujets ou aux modérateurs de réouvrir les sujets comme étant non-résolus. Les deux options « Oui » autorisent les modérateurs.',
	'LOCK_SOLVED'                => 'Verrouiller les sujets résolus ',
	'LOCK_SOLVED_EXPLAIN'        => 'Notez que seuls les modérateurs peuvent réouvrir un sujet verrouillé.',
	'TOPIC_SOLVED_SETTINGS'      => 'Réglages de l’extension « Topic solved - Sujet résolu »',
	'FORUM_SOLVE_TEXT'           => 'Choisir le texte à la place de l’image-résolu ',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Vous pouvez définir du texte à la place de l’image, par ex. [RESOLU] ou [VENDU] ou autre chose. Laissez ce champ vide pour utiliser l’image.',
	'FORUM_SOLVE_COLOUR'         => 'Couleur du texte ',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Choisissez une couleur pour le texte en utilisant un code hexadécimal (exemple : FFFF80), laissez ce champ vide pour utiliser la couleur par défaut.',
	'YES_MOD'                    => 'Oui, que le modérateur',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Sujet résolu',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Sujet résolu',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Sujet résolu',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Accepter cette réponse',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Marquer ce sujet comme non résolu',
));
