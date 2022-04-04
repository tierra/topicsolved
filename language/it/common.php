<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Marco Guerrini
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
	'SEARCH_UNSOLVED' => 'Argomenti non risolti',
	'SEARCH_YOUR_UNSOLVED' => 'I tuoi messaggi non risolti',
	'SEARCH_SOLVED' => 'Cerca solo tra gli argomenti risolti',
	'TOPIC_SOLVED' => 'Argomento risolto',
	'SET_TOPIC_SOLVED' => 'Accetta questa risposta',
	'SET_TOPIC_NOT_SOLVED' => 'Marca argomento come non risolto',
	'BAD_METHOD_CALL' => 'Argomento invalido passato al metodo `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'Non hai i permessi di marcare questo argomento come risolto o non risolto.',
	'TOPIC_ALREADY_SOLVED' => 'Questo argomento è già marcato come risolto.',
	'TOPIC_ALREADY_UNSOLVED' => 'Questo argomento è già marcato come non risolto.',
));
