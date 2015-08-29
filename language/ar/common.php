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
	'SEARCH_UNSOLVED' => 'ُمُشاهدة المواضيع التي بدون إجابة',
	'SEARCH_YOUR_UNSOLVED' => 'ُمُشاهدة مواضيعك التي بدون إجابة',
	'SEARCH_SOLVED' => 'البحث في المواضيع التي تمت الإجابة عليها',
	'TOPIC_SOLVED' => 'تمت الإجابة على الموضوع',
	'SET_TOPIC_SOLVED' => 'الموافقة على هذه الإجابة',
	'SET_TOPIC_NOT_SOLVED' => 'إجعل الموضوع بدون إجابة',
	'BAD_METHOD_CALL' => 'هناك متغير غير صحيح عبر الطريقة `%1$s`.',
	'FORBIDDEN_MARK_SOLVED' => 'ليس لديك الصلاحية لتغيير حالة الموضوع إلى "تمت الإجابة" أو "بدون إجابة".',
	'TOPIC_ALREADY_SOLVED' => 'تمت الإجابة على الموضوع مُسبقاً.',
	'TOPIC_ALREADY_UNSOLVED' => 'الموضوع بدون إجابة مُسبقاً.',
));
