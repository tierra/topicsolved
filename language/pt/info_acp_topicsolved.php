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
	'ALLOW_SOLVE'                => 'Permitir que os tópicos sejam marcados como resolvidos.',
	'ALLOW_SOLVE_EXPLAIN'        => 'Permite ao autor do tópico ou aos moderadores marcar o tópico como resolvido. Os moderadores podem resolver tópicos em ambas as opções positivas.',
	'ALLOW_UNSOLVE'              => 'Permitir que os tópicos possam ser reabertos',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Permite aos utilizadores ou aos moderadores alterar o estado de um tópico para não resolvido. Os moderadores podem alterar o estado dos tópicos em ambas as opções positivas.',
	'LOCK_SOLVED'                => 'Bloquear tópicos resolvidos',
	'LOCK_SOLVED_EXPLAIN'        => 'Apenas os moderadores podem reabrir tópicos bloqueados.',
	'TOPIC_SOLVED_SETTINGS'      => 'Configurações dos tópicos resolvidos',
	'FORUM_SOLVE_TEXT'           => 'Escolha um texto em vez de uma imagem para marcar como resolvido',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Podes usar um texto, em vez de uma imagem, para marcar um tópico como resolvido. Ex: [RESOLVIDO] ou [VENDIDO] ou qualquer outra coisa. Deixe em branco para usar a imagem  por defeito.',
	'FORUM_SOLVE_COLOUR'         => 'Cor do texto',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Escolha a cor do texto. Deixe em branco para usar a cor por defeito.',
	'YES_MOD'                    => 'Sim, moderador',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Tópico resolvido',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Tópico resolvido',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Tópico resolvido',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Aceitar esta resposta',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Marcar tópico como não resolvido',
));
