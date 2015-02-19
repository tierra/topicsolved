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
	'SEARCH_UNSOLVED' => '未解決トピックを閲覧',
	'SEARCH_YOUR_UNSOLVED' => '未解決トピックを閲覧',
	'SEARCH_SOLVED' => '未解決トピックのみを検索',
	'TOPIC_SOLVED' => 'トピックは解決済みです',
	'SET_TOPIC_SOLVED' => 'この回答を受け入れる',
	'SET_TOPIC_NOT_SOLVED' => 'トピックを未解決として設定',
	'BAD_METHOD_CALL' => 'メソッド"%s"へ渡された引数が正しくありません。',
	'FORBIDDEN_MARK_SOLVED' => 'あなたはこのトピックを解決済み/未解決にすることが出来ません。',
	'TOPIC_ALREADY_SOLVED' => 'トピックは既に解決済みとしてマークされています。',
	'TOPIC_ALREADY_UNSOLVED' => 'トピックは既に未解決としてマークされています。',
));
