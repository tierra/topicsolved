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
	'ALLOW_SOLVE'                => 'Habilita tópicos a serem marcados como resolvidos.',
	'ALLOW_SOLVE_EXPLAIN'        => 'Deixa o dono do tópico (quem o iniciou) ou os moderadores marcarem o tópico como resolvido. Moderadores podem resolver tópicos em ambas as opções positivas.',
	'ALLOW_UNSOLVE'              => 'Habilita os tópicos a serem reabertos',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Permite aos usuários ou moderadores retornar um tópico para não resolvido. Moderadores podem desfazer a resolução dos tópicos em ambas as opções positivas.',
	'LOCK_SOLVED'                => 'Tranca tópicos resolvidos',
	'LOCK_SOLVED_EXPLAIN'        => 'Apenas os moderadores podem reabrir tópicos trancados.',
	'TOPIC_SOLVED_SETTINGS'      => 'Configurações dos tópicos resolvidos',
	'FORUM_SOLVE_TEXT'           => 'Escolha um texto em vez de uma imagem para resolvido',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Você pode usar um texto, em vez de uma imagem, para marcar um tópico resolvido. Ex.: [RESOLVIDO] or [VENDIDO] ou qualquer outra coisa. Deixe em branco para usar a imagem padrão.',
	'FORUM_SOLVE_COLOUR'         => 'Cor do texto',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Escolha a cor do texto. Deixe em branco para usar a cor padrão.',
	'YES_MOD'                    => 'Sim, moderador',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Tópico resolvido',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Tópico resolvido',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Tópico resolvido',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Aceitar esta resposta',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Marcar tópico como não resolvido',
));
