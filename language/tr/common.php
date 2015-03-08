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
	'SEARCH_UNSOLVED' => 'Çözülmemiş konuları gör',
	'SEARCH_YOUR_UNSOLVED' => 'Sizin çözülmemiş konularınızı görüntüleyin',
	'SEARCH_SOLVED' => 'Sadece çözülmüş konularda ara',
	'TOPIC_SOLVED' => 'Konu çözüldü',
	'SET_TOPIC_SOLVED' => 'Bu cevabı kabul et',
	'SET_TOPIC_NOT_SOLVED' => 'Konuyu çözülmemiş olarak ayarla',
	'BAD_METHOD_CALL' => 'Geçersiz argüman şu metoda geçti "%s".',
	'FORBIDDEN_MARK_SOLVED' => 'Bu konuyu çözüldü veya çözülmedi olarak işaretleme izniniz yok.',
	'TOPIC_ALREADY_SOLVED' => 'Konu zaten çözüldü olarak işaretli.',
	'TOPIC_ALREADY_UNSOLVED' => 'Konu zaten çözülmedi olarak işaretli.',
));
