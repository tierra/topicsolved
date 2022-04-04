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
	'ALLOW_SOLVE'                => 'Permetti agli argomenti di essere marcati come risolti',
	'ALLOW_SOLVE_EXPLAIN'        => 'Fornisci ai creatori del topic o ai moderatori la possibilità di marcare il topic come risolto. I moderatori possono marcare i topic in entrambe le opzioni a si.',
	'ALLOW_UNSOLVE'              => 'Permetti ai topic di essere aperti nuovamente.',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Dai agli utenti o ai moderatori la possibilità di marcare un topic nuovamente come non risolto. I moderatori possono marcare i topic con entrambe le opzioni si.',
	'LOCK_SOLVED'                => 'Blocca gli argomenti risolti',
	'LOCK_SOLVED_EXPLAIN'        => 'Nota: solo i moderatori possono sbloccare argomenti bloccati.',
	'TOPIC_SOLVED_SETTINGS'      => 'Configurazione Topic solved',
	'FORUM_SOLVE_TEXT'           => 'Seleziona un testo al posto dell\'immagine risolto',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Puoi avere del testo al posto dell\'immagine risolto. Es: [RISOLTO] o [SOLV] o quello che vuoi. Lascia vuoto per usare l\'immagine risolto.',
	'FORUM_SOLVE_COLOUR'         => 'Colore del testo',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Seleziona un colore per il testo. Lascia vuoto per usare il colore predefinito.',
	'YES_MOD'                    => 'Si, moderatore',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Argomento risolto',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Argomento risolto',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Argomento risolto',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Accetta questa risposta',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Marca argomento come non risolto',
));
