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

use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Main extension controller.
 *
 * @package tierra/topicsolved/controller
 */
class main_controller
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\config\db_text */
	protected $config_text;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string core.root_path */
	protected $root_path;

	/** @var string core.php_ext */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config $config
	 * @param \phpbb\config\db_text $config_text DB text object
	 * @param \phpbb\controller\helper $helper
	 * @param \phpbb\db\driver\driver_interface $db Database object
	 * @param \phpbb\request\request $request Request object
	 * @param \phpbb\template\template $template
	 * @param \phpbb\user $user
	 * @param string $root_path core.root_path
	 * @param string $php_ext core.php_ext
	 */
	public function __construct(
		\phpbb\config\config $config,
		\phpbb\config\db_text $config_text,
		\phpbb\controller\helper $helper,
		\phpbb\db\driver\driver_interface $db,
		\phpbb\request\request $request,
		\phpbb\template\template $template,
		\phpbb\user $user,
		$root_path, $php_ext)
	{
		$this->config = $config;
		$this->config_text = $config_text;
		$this->helper = $helper;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	 * Mark a post as solving the topic.
	 *
	 * Route: /topicsolved/solve/{forum_id}/{post_id}
	 *
	 * @param int $forum_id Forum the post belongs to.
	 * @param int $post_id Post to mark as solved.
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function solve($forum_id, $post_id)
	{
		// TODO: Mark post as solved.

		$post_url = append_sid("{$this->root_path}viewtopic.{$this->php_ext}",
			"f=$forum_id&amp;t=$post_id&amp;p=$post_id") . '#p' . $post_id;

		return new RedirectResponse($post_url);
	}

	/**
	 * Mark a post as not solving the topic.
	 *
	 * Route: /topicsolved/unsolve/{forum_id}/{post_id}
	 *
	 * @param int $forum_id Forum the post belongs to.
	 * @param int $post_id Post to remove solved mark.
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function unsolve($forum_id, $post_id)
	{
		// TODO: Mark post as unsolved.

		$post_url = append_sid("{$this->root_path}viewtopic.{$this->php_ext}",
				"f=$forum_id&amp;t=$post_id&amp;p=$post_id") . '#p' . $post_id;

		return new RedirectResponse($post_url);
	}
}
