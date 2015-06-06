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
	'ALLOW_SOLVE'                => 'トピックを解決済みとしてマークすることを許可',
	'ALLOW_SOLVE_EXPLAIN'        => 'トピックスターターまたはモデレーターに解決済みとしてトピックを設定する機能を与えます。モデレーターは両方の「はい」オプションのトピックを解決することが出来ます。',
	'ALLOW_UNSOLVE'              => 'トピックの再オープンを許可',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'ユーザーまたはモデレーターに未解決としてトピックを戻す機能を与えます。モデレーターは両方の「はい」オプションのトピックを未解決にすることが出来ます。',
	'LOCK_SOLVED'                => '解決済みトピックの凍結',
	'LOCK_SOLVED_EXPLAIN'        => 'モデレーターのみ凍結済みのトピックを再オープンすることができることに注意してください。',
	'TOPIC_SOLVED_SETTINGS'      => 'トピック解決済み設定',
	'FORUM_SOLVE_TEXT'           => '解決済み画像の代わりのテキストを選択します',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'ナイスなトピック解決済み画像の代わりにいくつかのテキストを持つことが出来ます。 例: [解決済み]、【解決】等。空白にするとトピック解決済みの画像を使用します。',
	'FORUM_SOLVE_COLOUR'         => 'テキストの色',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'テキストの色を選択します。空白にするとデフォルトカラーを使用します。',
	'YES_MOD'                    => 'はい、モデレーター',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => '解決済',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => '解決済',
	'IMG_ICON_TOPIC_SOLVED_POST'    => '解決済',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'この回答を受け入れる',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'トピックを未解決としてマーク',
));
