<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/event
 */

namespace tierra\topicsolved\event;

use tierra\topicsolved\topicsolved;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * ACP forum edit event listener.
 *
 * @package tierra/topicsolved/event
 */
class acp_forums implements EventSubscriberInterface
{
	/* @var \tierra\topicsolved\topicsolved */
	protected $topicsolved;

	/** @var \phpbb\template\template */
	protected $template;

	/**
	 * Constructor
	 *
	 * @param \tierra\topicsolved\topicsolved $topicsolved Core topicsolved helper.
	 * @param \phpbb\template\template $template
	 */
	public function __construct(
		topicsolved $topicsolved,
		\phpbb\template\template $template,
		\phpbb\user $user)
	{
		$this->topicsolved = $topicsolved;
		$this->template = $template;
		$user->add_lang_ext('tierra/topicsolved', 'info_acp_forums');
	}

	/**
	 * Assign functions defined in this class to event listeners in core.
	 *
	 * @return array
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_manage_forums_initialise_data'
				=> 'acp_manage_forums_initialise_data',
			'core.acp_manage_forums_display_form'
				=> 'acp_manage_forums_display_form',
			'core.acp_manage_forums_request_data'
				=> 'acp_manage_forums_request_data',
		);
	}

	/**
	 * Initialize default topic solved settings for new forums.
	 *
	 * @param \phpbb\event\data $event Forum edit form data.
	 *
	 * @return void
	 */
	public function acp_manage_forums_initialise_data($event)
	{
		$forum_data = $event['forum_data'];

		if ($event['action'] == 'add' && !$event['update'])
		{
			$forum_data['forum_allow_solve']    = 1;
			$forum_data['forum_allow_unsolve']  = 1;
			$forum_data['forum_solve_text']     = '';
			$forum_data['forum_solve_color']    = '';
			$forum_data['forum_lock_solved']    = 0;
		}

		$event['forum_data'] = $forum_data;
	}

	/**
	 * Format topic solved settings for forum edit form.
	 *
	 * @param \phpbb\event\data $event Forum edit form data.
	 *
	 * @return void
	 */
	public function acp_manage_forums_display_form($event)
	{
		$template_data = $event['template_data'];
		$forum_data = $event['forum_data'];

		$template_data = array_merge($template_data, array(
			'S_FORUM_ALLOW_SOLVE' => $forum_data['forum_allow_solve'],
			'S_FORUM_LOCK_SOLVED' => $forum_data['forum_lock_solved'],
			'S_FORUM_ALLOW_UNSOLVE' => $forum_data['forum_allow_unsolve'],
			'FORUM_SOLVE_TEXT' => $forum_data['forum_solve_text'],
			'FORUM_SOLVE_COLOR' => $forum_data['forum_solve_color'],
			// TODO: Enable solved topic image.
			//'FORUM_SOLVE_IMG' => ($forum_data['forum_solve_text']) ? '' : $user->img('icon_topic_solved_head', 'TOPIC_SOLVED'),
			'FORUM_SOLVE_IMG' => '',
			'TOPIC_SOLVED_YES' => topicsolved::TOPIC_SOLVED_YES,
			'TOPIC_SOLVED_MOD' => topicsolved::TOPIC_SOLVED_MOD,
			// TODO: Re-implement color swatch picker.
			//'U_SOLVE_SWATCH' => append_sid("{$phpbb_admin_path}swatch.$phpEx", 'form=forumedit&amp;name=forum_solve_color'),
		));

		$event['template_data'] = $template_data;
	}

	/**
	 * Process topic solved settings form request data.
	 *
	 * @param \phpbb\event\data $event Forum form request data.
	 *
	 * @return void
	 */
	public function acp_manage_forums_request_data($event)
	{
		$forum_data = $event['forum_data'];

		$forum_data = array_merge($forum_data, array(
			'forum_allow_solve'     => request_var('forum_allow_solve', 1),
			'forum_allow_unsolve'   => request_var('forum_allow_unsolve', 1),
			'forum_solve_text'      => utf8_normalize_nfc(request_var('forum_solve_text', '', true)),
			'forum_solve_color'     => trim(request_var('forum_solve_color', '')),
			'forum_lock_solved'     => request_var('forum_lock_solved', 0),
		));

		$event['forum_data'] = $forum_data;
	}
}
