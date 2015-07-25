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

use phpbb\exception\http_exception;
use tierra\topicsolved\topicsolved;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Main extension controller.
 *
 * @package tierra/topicsolved/controller
 */
class main_controller
{
	/** @var \tierra\topicsolved\topicsolved */
	protected $topicsolved;

	/**
	 * Constructor
	 *
	 * @param \tierra\topicsolved\topicsolved $topicsolved Core topicsolved helper.
	 */
	public function __construct(topicsolved $topicsolved)
	{
		$this->topicsolved = $topicsolved;
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
			throw new http_exception(404, 'TOPIC_NOT_FOUND');
		}

		$this->check_solve_conditions($solve, $topic_data);

		if ($solve == 'solved')
		{
			$this->topicsolved->mark_solved($topic_data, $post_id);
		}
		else
		{
			$this->topicsolved->mark_unsolved($topic_data);
		}

		$post_url = $this->topicsolved->get_link_to_post(
			$topic_data['forum_id'], $topic_data['topic_id'], $post_id);

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
			throw new http_exception(403, 'FORBIDDEN_MARK_SOLVED');
		}

		if ($solve == 'solved' && !empty($topic_data['topic_solved']))
		{
			throw new http_exception(403, 'TOPIC_ALREADY_SOLVED');
		}
		else if ($solve == 'unsolved' && empty($topic_data['topic_solved']))
		{
			throw new http_exception(403, 'TOPIC_ALREADY_UNSOLVED');
		}
	}
}
