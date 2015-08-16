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
	'SEARCH_UNSOLVED' => 'Afficher les sujets non résolus',
	'SEARCH_YOUR_UNSOLVED' => 'Afficher mes sujets non résolus',
	'SEARCH_SOLVED' => 'Rechercher seulement dans les sujets résolus',
	'TOPIC_SOLVED' => 'Le sujet est résolu',
	'SET_TOPIC_SOLVED' => 'Accepter cette réponse',
	'SET_TOPIC_NOT_SOLVED' => 'Marquer ce sujet comme non résolu',
	'BAD_METHOD_CALL' => 'Un paramètre invalide a été envoyé par la méthode `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'Vous n’êtes pas autorisé à marquer ce sujet résolu ou non résolu.',
	'TOPIC_ALREADY_SOLVED' => 'Le sujet est déjà marqué comme résolu.',
	'TOPIC_ALREADY_UNSOLVED' => 'Le sujet est déjà marqué comme non résolu.',
));
