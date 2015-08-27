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
	'SEARCH_UNSOLVED' => 'Visualizar tópicos não resolvidos',
	'SEARCH_YOUR_UNSOLVED' => 'Visualizar seus tópicos não resolvidos',
	'SEARCH_SOLVED' => 'Buscar apenas em tópicos resolvidos',
	'TOPIC_SOLVED' => 'Tópico resolvido',
	'SET_TOPIC_SOLVED' => 'Aceitar esta resposta',
	'SET_TOPIC_NOT_SOLVED' => 'Marcar tópico como resolvido',
	'BAD_METHOD_CALL' => 'Argumento inválido passado para o método `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'Você não tem permissões para marcar este tópico como resolvido ou não resolvido.',
	'TOPIC_ALREADY_SOLVED' => 'Tópico já foi marcado como resolvido.',
	'TOPIC_ALREADY_UNSOLVED' => 'Tópico já está marcado como não resolvido.',
));
