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
	'SEARCH_UNSOLVED' => 'Onopgeloste onderwerpen weergeven',
	'SEARCH_YOUR_UNSOLVED' => 'Eigen onopgeloste onderwerpen weergeven',
	'SEARCH_SOLVED' => 'Zoek alleen in opgeloste onderwerpen',
	'TOPIC_SOLVED' => 'Onderwerp is opgelost',
	'SET_TOPIC_SOLVED' => 'Accepteer dit antwoord',
	'SET_TOPIC_NOT_SOLVED' => 'Onderwerp instelllen als onopgelost',
	'BAD_METHOD_CALL' => 'Invalid argument passed to method "%s".',
	'FORBIDDEN_MARK_SOLVED' => 'Je bent niet bevoegd om het onderwerp te markeren als opgelost of onopgelost.',
	'TOPIC_ALREADY_SOLVED' => 'Het onderwerp is al gemarkeerd als opgelost.',
	'TOPIC_ALREADY_UNSOLVED' => 'Het onderwerp is al gemarkeerd als onopgelost.',
));
