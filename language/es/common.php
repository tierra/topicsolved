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
	'SEARCH_UNSOLVED' => 'Ver temas no solucionados',
	'SEARCH_YOUR_UNSOLVED' => 'Ver sus temas no solucionados',
	'SEARCH_SOLVED' => 'Buscar solo en temas solucionados',
	'TOPIC_SOLVED' => 'Tema Solucionado',
	'SET_TOPIC_SOLVED' => 'Aceptar esta respuesta',
	'SET_TOPIC_NOT_SOLVED' => 'Establecer tema, como no solucionado',
	'BAD_METHOD_CALL' => 'Argumento no válido pasó en el método “%s”.',
	'FORBIDDEN_MARK_SOLVED' => 'No tiene permitido marcar este tema como solucionado, o no solucionado.',
	'TOPIC_ALREADY_SOLVED' => 'El tema ya esta marcado como solucionado.',
	'TOPIC_ALREADY_UNSOLVED' => 'El tema ya esta marcado como no solucionado.',
));
