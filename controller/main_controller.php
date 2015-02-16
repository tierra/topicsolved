<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/controller
 */

namespace tierra\topicsolved\controller;

use tierra\topicsolved\topicsolved;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Main extension controller.
 *
 * @package tierra/topicsolved/controller
 */
class main_controller
{
	/* @var \tierra\topicsolved\topicsolved */
	protected $topicsolved;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string core.root_path */
	protected $root_path;

	/** @var string core.php_ext */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \tierra\topicsolved\topicsolved $topicsolved Core topicsolved helper.
	 * @param \phpbb\config\config $config
	 * @param \phpbb\controller\helper $helper
	 * @param \phpbb\request\request $request Request object
	 * @param \phpbb\template\template $template
	 * @param string $root_path core.root_path
	 * @param string $php_ext core.php_ext
	 */
	public function __construct(
		topicsolved $topicsolved,
		\phpbb\config\config $config,
		\phpbb\controller\helper $helper,
		\phpbb\request\request $request,
		\phpbb\template\template $template,
		$root_path, $php_ext)
	{
		$this->topicsolved = $topicsolved;
		$this->config = $config;
		$this->helper = $helper;
		$this->request = $request;
		$this->template = $template;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	 * Mark a topic as solved or unsolved.
	 *
	 * Route: /topicsolved/mark/{solve}/{post_id}
	 *
	 * @param string $solve Either "solved" or "unsolved".
	 * @param int $post_id Post to mark.
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function mark($solve, $post_id)
	{
		$topic_data = $this->topicsolved->get_topic_data($post_id);

		if (empty($topic_data))
		{
			throw new \phpbb\exception\http_exception(404, 'TOPIC_NOT_FOUND');
		}

		$this->check_solve_conditions($solve, $topic_data);

		$lock_topic = (bool) $topic_data['forum_lock_solved'];
		$solved_post_id = $solve == 'solved' ? $post_id : 0;
		$this->topicsolved->update_topic_solved(
			$topic_data['topic_id'], $solved_post_id, $lock_topic);

		$post_url = append_sid("{$this->root_path}viewtopic.{$this->php_ext}",
			"f={$topic_data['forum_id']}&t=$post_id&p=$post_id") . '#p' . $post_id;

		return new RedirectResponse($post_url);
	}

	/**
	 * Check user permissions and topic status is valid for solving or
	 * unsolving the post and topic given.
	 *
	 * @param string $solve Either "solved" or "unsolved".
	 * @param array $topic_data Topic to be solved or unsolved.
	 *
	 * @throws \phpbb\exception\http_exception
	 *         if post and topic can not be marked as solved or unsolved.
	 *
	 * @return void
	 */
	protected function check_solve_conditions($solve, $topic_data)
	{
		if (!$this->topicsolved->user_can_solve_post($solve, $topic_data))
		{
			throw new \phpbb\exception\http_exception(403, 'FORBIDDEN_MARK_SOLVED');
		}

		if ($solve == 'solved' && !empty($topic_data['topic_solved']))
		{
			throw new \phpbb\exception\http_exception(403, 'TOPIC_ALREADY_SOLVED');
		}
		else if ($solve == 'unsolved' && empty($topic_data['topic_solved']))
		{
			throw new \phpbb\exception\http_exception(403, 'TOPIC_ALREADY_UNSOLVED');
		}
	}
}
