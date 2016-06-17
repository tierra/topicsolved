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
	'SEARCH_YOUR_UNSOLVED' => 'Visualiza os teus tópicos não resolvidos',
	'SEARCH_SOLVED' => 'Pesquisar apenas em tópicos resolvidos',
	'TOPIC_SOLVED' => 'Tópico resolvido',
	'SET_TOPIC_SOLVED' => 'Aceitar esta resposta',
	'SET_TOPIC_NOT_SOLVED' => 'Marcar tópico como resolvido',
	'BAD_METHOD_CALL' => 'Argumento inválido passado para o método `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'Não tens permissões para marcar este tópico como resolvido ou não resolvido.',
	'TOPIC_ALREADY_SOLVED' => 'O tópico já estava marcado como resolvido.',
	'TOPIC_ALREADY_UNSOLVED' => 'O tópico já estava marcado como não resolvido.',
));
