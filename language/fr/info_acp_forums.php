<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 * French translation by zouloufr
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
	'ALLOW_SOLVE'               => 'Autoriser les sujets à être marqués comme résolus',
	'ALLOW_SOLVE_EXPLAIN'       => 'Permet de  donner la permission aux auteurs des sujets ou aux modérateurs d\'afficher un sujet comme étant résolu. Les modérateurs peuvent éditer ces deux choix.',
	'ALLOW_UNSOLVE'             => 'Autoriser la réouverture du sujet',
	'ALLOW_UNSOLVE_EXPLAIN'     => 'Permet de donner la permission aux auteurs des sujets ou aux modérateurs de rouvrir le sujet comme non-résolu. Les modérateurs peuvent éditer ces deux choix.',
	'LOCK_SOLVED'               => 'Verrouiller les sujets résolus',
	'LOCK_SOLVED_EXPLAIN'       => 'Notez que seuls les modérateurs peuvent rouvrir un sujet verrouillé.',
	'TOPIC_SOLVED_SETTINGS'     => 'Réglages de l\'extension "Topic solved" - "Sujet résolu"',
	'FORUM_SOLVE_TEXT'          => 'Choisir le texte à la place de l\'image-résolu',
	'FORUM_SOLVE_TEXT_EXPLAIN'  => 'Vous pouvez définir du texte à la place de l\'image, par ex. [RESOLU] ou [VENDU] ou autre chose. Laissez ce champ vide pour utiliser l\'image.',
	'FORUM_SOLVE_COLOR'         => 'Couleur du texte',
	'FORUM_SOLVE_COLOR_EXPLAIN' => 'Choisissez une couleur pour le texte, laissez ce champ vide pour utiliser la couleur par défaut.',
	'YES_MOD'                   => 'Oui, modérateur',
));
