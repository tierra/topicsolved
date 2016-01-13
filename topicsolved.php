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
	/** No-one can mark topics as solved. */
	const TOPIC_SOLVED_NO = 0;

	/** Topic starter and moderators can mark topics as solved. */
	const TOPIC_SOLVED_YES = 1;

	/** Only moderators can mark topics as solved. */
	const TOPIC_SOLVED_MOD = 2;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\event\dispatcher_interface */
	protected $dispatcher;

	/** @var string core.root_path */
	protected $root_path;

	/** @var string core.php_ext */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\db\driver\driver_interface $db Database object
	 * @param \phpbb\user $user
	 * @param \phpbb\auth\auth $auth
	 * @param \phpbb\event\dispatcher_interface $dispatcher
	 * @param string $root_path core.root_path
	 * @param string $php_ext core.php_ext
	 */
	public function __construct(
		\phpbb\db\driver\driver_interface $db,
		\phpbb\user $user,
		\phpbb\auth\auth $auth,
		\phpbb\event\dispatcher_interface $dispatcher,
		$root_path, $php_ext)
	{
		$this->db = $db;
		$this->user = $user;
		$this->auth = $auth;
		$this->dispatcher = $dispatcher;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;

		$this->user->add_lang_ext('tierra/topicsolved', 'common');
	}

	/**
	 * Determine if user is allowed to mark a post as solved or unsolved.
	 *
	 * @param string $solved Either "solved" or "unsolved".
	 * @param array $topic_data Topic to be solved or unsolved.
	 *
	 * @throws \phpbb\exception\runtime_exception
	 *         if an invalid solved parameter is specified.
	 *
	 * @return bool User is authorized to (un)solve topic.
	 */
	public function user_can_solve_post($solved, $topic_data)
	{
		// Disallow (un)solving topic if post is global.
		if ($topic_data['topic_type'] == POST_GLOBAL)
		{
			return false;
		}

		$forum_permission = array(
			'solved' => 'forum_allow_solve',
			'unsolved' => 'forum_allow_unsolve',
		);

		if (!array_key_exists($solved, $forum_permission))
		{
			throw new \phpbb\exception\runtime_exception(
				'BAD_METHOD_CALL', array('user_can_solve_post'));
		}

		if (($topic_data[$forum_permission[$solved]] == topicsolved::TOPIC_SOLVED_MOD ||
			$topic_data[$forum_permission[$solved]] == topicsolved::TOPIC_SOLVED_YES) &&
			$this->auth->acl_get('m_', $topic_data['forum_id']))
		{
			return true;
		}
		else if ($topic_data[$forum_permission[$solved]] == topicsolved::TOPIC_SOLVED_YES &&
			$topic_data['topic_poster'] == $this->user->data['user_id'] &&
			$topic_data['topic_status'] == ITEM_UNLOCKED)
		{
			return true;
		}

		return false;
	}

	/**
	 * Fetches all topic solved data related to the given post.
	 *
	 * @param int $post_id ID of post to fetch topic/forum data for.
	 *
	 * @return mixed topic data, or false if not found
	 */
	public function get_topic_data($post_id)
	{
		$select_sql_array = array(
			'SELECT' =>
				't.topic_id, t.topic_poster, t.topic_status, t.topic_type, t.topic_solved, ' .
				'f.forum_id, f.forum_allow_solve, f.forum_allow_unsolve, f.forum_lock_solved, ' .
				'p.post_id',
			'FROM' => array(
				FORUMS_TABLE => 'f',
				POSTS_TABLE => 'p',
				TOPICS_TABLE => 't',
			),
			'WHERE' =>
				'p.post_id = ' . (int) $post_id .
				' AND t.topic_id = p.topic_id AND f.forum_id = t.forum_id',
		);
		$select_sql = $this->db->sql_build_query('SELECT', $select_sql_array);
		$result = $this->db->sql_query($select_sql);
		$topic_data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $topic_data;
	}

	/**
	 * Update topic with the given data.
	 *
	 * @param int $topic_id Topic to update.
	 * @param array $data Topic data to update.
	 *
	 * @return mixed true if successful
	 */
	public function update_topic($topic_id, $data)
	{
		$update_sql = $this->db->sql_build_array('UPDATE', $data);
		$result = $this->db->sql_query('
			UPDATE ' . TOPICS_TABLE . '
			SET ' . $update_sql . '
			WHERE topic_id = ' . (int) $topic_id
		);

		return $result;
	}

	/**
	 * Marks a topic as solved.
	 *
	 * @param array $topic_data Topic to be marked as solved.
	 * @param int $post_id Post to mark as the solution.
	 */
	public function mark_solved($topic_data, $post_id)
	{
		// Database column values to set.
		$column_data = array('topic_solved' => $post_id);

		if ($topic_data['forum_lock_solved'] &&
			$this->user_can_lock_post($topic_data['forum_id']))
		{
			$column_data['topic_status'] = ITEM_LOCKED;
		}

		$this->update_topic($topic_data['topic_id'], $column_data);

		/**
		 * This event allows you to perform additional actions after a topic has been marked as solved.
		 *
		 * @event tierra.topicsolved.mark_solved_after
		 * @var	array	topic_data	Array with general topic data
		 * @var	array	column_data	Array with topic data that the database has been updated with
		 * @since 2.2.0
		 */
		$vars = array(
			'topic_data',
			'column_data',
		);
		extract($this->dispatcher->trigger_event('tierra.topicsolved.mark_solved_after', compact($vars)));
	}

	/**
	 * Marks a topic as unsolved.
	 *
	 * @param array $topic_data Topic to be marked as unsolved.
	 */
	public function mark_unsolved($topic_data)
	{
		// Database column values to set.
		$column_data = array('topic_solved' => 0);

		if ($topic_data['forum_lock_solved'] &&
			$this->auth->acl_get('m_lock', $topic_data['forum_id']))
		{
			$column_data['topic_status'] = ITEM_UNLOCKED;
		}

		$this->update_topic($topic_data['topic_id'], $column_data);

		/**
		 * This event allows you to perform additional actions after a topic has been marked as unsolved.
		 *
		 * @event tierra.topicsolved.mark_unsolved_after
		 * @var	array	topic_data	Array with general topic data
		 * @var	array	column_data	Array with topic data that the database has been updated with
		 * @since 2.2.0
		 */
		$vars = array(
			'topic_data',
			'column_data',
		);
		extract($this->dispatcher->trigger_event('tierra.topicsolved.mark_unsolved_after', compact($vars)));
	}

	/**
	 * Checks if the currently logged in user has permission to lock a post.
	 *
	 * Regular users won't have permission to solve any topics other than their
	 * own, and moderator permissions are forum based, so we only need to know
	 * the forum, not the post.
	 *
	 * @param int $forum_id Forum to check permissions on.
	 *
	 * @return bool true if user has permission to lock a post.
	 */
	public function user_can_lock_post($forum_id)
	{
		// Check if user is moderator with appropriate lock permission
		if ($this->auth->acl_get('m_lock', $forum_id))
		{
			return true;
		}

		// Check if user has "lock own posts" permission
		if ($this->auth->acl_get('f_user_lock', $forum_id))
		{
			return true;
		}

		return false;
	}

	/**
	 * Generate markup for the given solved indicator image.
	 *
	 * @param string $type One of "head", "list", or "post".
	 * @param string $alt Language code for title and alternative text.
	 * @param string $url Optional link to solved post.
	 *
	 * @return string HTML markup for image.
	 */
	public function image($type, $alt = '', $url = '')
	{
		$title = '';

		$markup = $this->user->img('icon_solved_' . $type, $alt);

		if (!empty($alt))
		{
			$alt = $this->user->lang($alt);
			$title = ' title="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"';
		}

		if (!empty($url))
		{
			$markup = sprintf('<a href="%s"%s>%s</a>',
				htmlspecialchars($url, ENT_QUOTES, 'UTF-8'), $title, $markup);
		}

		return $markup;
	}

	/**
	 * Generate link to specific post (usually solution post).
	 *
	 * @param int $forum_id
	 * @param int $topic_id
	 * @param int $post_id
	 *
	 * @return string Relative URL to post
	 */
	public function get_link_to_post($forum_id, $topic_id, $post_id)
	{
		return append_sid("{$this->root_path}viewtopic.{$this->php_ext}",
			"f=$forum_id&t=$topic_id&p=$post_id") . '#p' . $post_id;
	}
}
