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
	'ALLOW_SOLVE'                => 'Allow topics to be marked as solved',
	'ALLOW_SOLVE_EXPLAIN'        => 'Give topic starters or moderators the ability to set a topic as solved. Moderators can solve topics in both yes-options.',
	'ALLOW_UNSOLVE'              => 'Allow topics to be reopened',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Give users or moderators the ability to set a topic back as not solved. Moderators can unsolve topics in both yes-options.',
	'LOCK_SOLVED'                => 'Lock solved topics',
	'LOCK_SOLVED_EXPLAIN'        => 'Note that only moderators can reopen locked topics.',
	'TOPIC_SOLVED_SETTINGS'      => 'Topic solved settings',
	'FORUM_SOLVE_TEXT'           => 'Choose text instead of solved-image',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'You can have some text instead of the nice topic solved image. Ex [SOLVED] or [SOLD] or something else. Leave empty to use the topic solved image.',
	'FORUM_SOLVE_COLOUR'         => 'Colour for the text',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Choose a colour for the text. Leave empty to use default colour.',
	'YES_MOD'                    => 'Yes, moderator',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Topic is solved',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Topic is solved',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Topic is solved',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Accept this answer',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Mark topic as not solved',
));
