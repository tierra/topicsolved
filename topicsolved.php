<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved
 */

namespace tierra\topicsolved;

/**
 * Core topic solved functionality used throughout the extension.
 *
 * @package tierra/topicsolved
 */
class topicsolved
{
	/** Topic starter and moderators can mark topics as solved. */
	const TOPIC_SOLVED_YES = 1;

	/** Only moderators can mark topics as solved. */
	const TOPIC_SOLVED_MOD = 2;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/**
	 * Constructor
	 *
	 * @param \phpbb\user $user
	 * @param \phpbb\auth\auth $auth
	 */
	public function __construct(
		\phpbb\user $user,
		\phpbb\auth\auth $auth)
	{
		$this->user = $user;
		$this->auth = $auth;
	}

	/**
	 * Determine if user is allowed to mark a post as solved or unsolved.
	 *
	 * @param string $solved Either "solved" or "unsolved".
	 * @param array $topic_data Topic to be solved or unsolved.
	 *
	 * @return bool User is authorized to (un)solve topic.
	 */
	public function user_can_solve_post($solved, $topic_data)
	{
		if ($solved == 'solved')
		{
			$forum_permission = 'forum_allow_solve';
		}
		else if ($solved == 'unsolved')
		{
			$forum_permission = 'forum_allow_unsolve';
		}
		else
		{
			throw new \phpbb\exception\runtime_exception(
				'BAD_METHOD_CALL', array('user_can_solve_post'));
		}

		// Disallow (un)solving topic if post is global.
		if ($topic_data['topic_type'] == POST_GLOBAL)
		{
			return false;
		}

		if (($topic_data[$forum_permission] == topicsolved::TOPIC_SOLVED_MOD ||
			$topic_data[$forum_permission] == topicsolved::TOPIC_SOLVED_YES) &&
			$this->auth->acl_get('m_'))
		{
			return true;
		}
		else if ($topic_data[$forum_permission] == topicsolved::TOPIC_SOLVED_YES &&
			$topic_data['topic_poster'] == $this->user->data['user_id'] &&
			$topic_data['topic_status'] == ITEM_UNLOCKED)
		{
			return true;
		}

		return false;
	}
}
