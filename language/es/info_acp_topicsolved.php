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
	'ALLOW_SOLVE'                => 'Permitir que los temas puedan ser marcados como solucionados',
	'ALLOW_SOLVE_EXPLAIN'        => 'Permite a los usuarios que han creado el tema o Moderadores la posibilidad de fijar un tema como solucionado. Los Moderadores pueden marcar temas como solucionados, si en ambas opciones marca Si.',
	'ALLOW_UNSOLVE'              => 'Permitir que los temas puedan ser reabiertos',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Permite a los usuarios que han creado el tema o Moderadores la posibilidad de fijar un tema como no solucionado. Los Moderadores pueden marcar temas como solucionados, si en ambas opciones marca Si.',
	'LOCK_SOLVED'                => 'Cerrar temas solucionados',
	'LOCK_SOLVED_EXPLAIN'        => 'Tenga en cuenta que sólo los Moderadores pueden reabrir temas cerrados.',
	'TOPIC_SOLVED_SETTINGS'      => 'Ajustes de Tema Solucionado',
	'FORUM_SOLVE_TEXT'           => 'Elija el texto en lugar de la imagen de solucionado',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Puede tener un texto en lugar de la imagen de tema solucionado. Por ejemplo, [SOLUCIONADO] o [SOL] o algo por el estilo. Deje esto en blanco para usar la imagen de Tema Solucionado.',
	'FORUM_SOLVE_COLOUR'         => 'Color para el texto',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Elija el color para el texto. Deje esto en blanco para usar el color por defecto.',
	'YES_MOD'                    => 'Si, Moderador',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Tema Solucionado',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Tema Solucionado',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Tema Solucionado',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Aceptar esta respuesta',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Marcar tema, como no solucionado',
));
