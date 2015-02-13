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
 * Main event listener
 *
 * @package tierra/topicsolved/event
 */
class main_listener implements EventSubscriberInterface
{
	/* @var \tierra\topicsolved\topicsolved */
	protected $topicsolved;

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var string core.root_path */
	protected $root_path;

	/** @var string core.php_ext */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \tierra\topicsolved\topicsolved $topicsolved Core topicsolved helper.
	 * @param \phpbb\controller\helper $helper Controller helper object
	 * @param \phpbb\template\template $template Template object
	 * @param \phpbb\user $user
	 * @param \phpbb\auth\auth $auth
	 * @param string $root_path core.root_path
	 * @param string $php_ext core.php_ext
	 */
	public function __construct(
		topicsolved $topicsolved,
		\phpbb\controller\helper $helper,
		\phpbb\template\template $template,
		\phpbb\user $user,
		\phpbb\auth\auth $auth,
		$root_path, $php_ext)
	{
		$this->topicsolved = $topicsolved;
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;
		$this->auth = $auth;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;

		$this->user->add_lang_ext('tierra/topicsolved', 'common');
	}

	/**
	 * Assign functions defined in this class to event listeners in core.
	 *
	 * @return array
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.viewforum_modify_topicrow'
				=> 'viewforum_modify_topicrow',
			'core.viewtopic_assign_template_vars_before'
				=> 'viewtopic_assign_template_vars_before',
			'core.viewtopic_modify_post_row'
				=> 'viewtopic_modify_post_row',
		);
	}

	/**
	 * Assign topic solved view data for forum topics.
	 *
	 * @param \phpbb\event\data $event Topic row data being rendered.
	 *
	 * @return void
	 */
	public function viewforum_modify_topicrow($event)
	{
		if ($event['row']['topic_solved'] && $event['row']['topic_type'] != POST_GLOBAL)
		{
			$row = $event['row'];
			$topic_row = $event['topic_row'];

			// TODO: Add support for custom text/icon solved indicator.
			// TODO: Add support for custom style.

			$view_topic_url_params = 'f=' . $row['forum_id'] . '&amp;t=' . $row['topic_id'];
			$solved_post_url = append_sid(
					"{$this->root_path}viewtopic.{$this->php_ext}",
					$view_topic_url_params . '&amp;p=' . $row['topic_solved']
				) . '#p' . $row['topic_solved'];

			$topic_row['TOPIC_TITLE'] .= '</a>&nbsp;&nbsp;';
			$link_html = '<a href="%s" class="topictitle" style="%s">%s';

			if (!empty($row['forum_solve_text']))
			{
				if (!empty($row['forum_solve_color']))
				{
					$topic_row['TOPIC_TITLE'] .= sprintf($link_html, $solved_post_url,
						"color: #{$row['forum_solve_color']};", $row['forum_solve_text']);
				}
				else
				{
					$topic_row['TOPIC_TITLE'] .= sprintf($link_html, $solved_post_url, '', $row['forum_solve_text']);
				}
			}
			else
			{
				// TODO: Rewrite this from 3.0-compat to 3.1-compat code, it doesn't work currently.
				//$topic_row['TOPIC_TITLE'] .= sprintf($link_html, $solved_post_url, '',
				//	$this->user->img('images/icon_topic_solved_post.png', 'TOPIC_SOLVED'));

				// Fallback for now
				$topic_row['TOPIC_TITLE'] .= sprintf($link_html, $solved_post_url, 'color: #00CC00;', '[SOLVED]');
			}

			$event['topic_row'] = $topic_row;
		}
	}

	/**
	 * Assign topic solved view data for topic.
	 *
	 * @param \phpbb\event\data $event Topic data being rendered.
	 *
	 * @return void
	 */
	public function viewtopic_assign_template_vars_before($event)
	{
		$topic_data = $event['topic_data'];

		if ($topic_data['topic_solved'] && $topic_data['forum_allow_solve'] && $topic_data['topic_type'] != POST_GLOBAL)
		{
			$solved_post_url = append_sid(
					"{$this->root_path}viewtopic.{$this->php_ext}",
					"f={$event['forum_id']}&amp;t={$event['topic_id']}&amp;p={$topic_data['topic_solved']}"
				) . '#p' . $topic_data['topic_solved'];

			$this->template->assign_var('U_SOLVED_POST', $solved_post_url);
			$this->template->assign_var('TOPIC_SOLVED_STYLE', 'color: #00AA00;');
			$this->template->assign_var('TOPIC_SOLVED_TITLE', '[SOLVED]');
		}
	}

	/**
	 * Assign topic solved post data in topic view.
	 *
	 * @param \phpbb\event\data $event Post data being rendered.
	 *
	 * @return void
	 */
	public function viewtopic_modify_post_row($event)
	{
		$topic_data = $event['topic_data'];
		$post_row = $event['post_row'];

		if ($this->topicsolved->user_can_solve_post('solved', $topic_data) &&
			!$topic_data['topic_solved'])
		{
			$post_row['U_SET_SOLVED'] = $this->helper->route(
				'tierra_topicsolved_controller_solve', array(
					'forum_id' => (int) $topic_data['forum_id'],
					'post_id' => (int) $event['row']['post_id'],
				)
			);
		}
		else if ($this->topicsolved->user_can_solve_post('unsolved', $topic_data) &&
			$topic_data['topic_solved'])
		{
			$post_row['U_SET_SOLVED'] = $this->helper->route(
				'tierra_topicsolved_controller_unsolve', array(
					'forum_id' => (int) $topic_data['forum_id'],
					'post_id' => (int) $event['row']['post_id'],
				)
			);
		}

		if (!empty($topic_data['topic_solved']))
		{
			$post_row['S_TOPIC_SOLVED'] = $topic_data['topic_solved'];
		}

		if ($topic_data['topic_solved'] == $event['row']['post_id'] &&
			$topic_data['topic_type'] != POST_GLOBAL)
		{
			$post_row['POST_SUBJECT'] .= '&nbsp;&nbsp;';

			if (!empty($topic_data['forum_solve_text']))
			{
				if (!empty($topic_data['forum_solve_color']))
				{
					$post_row['POST_SUBJECT'] .= sprintf(
						'<span style="color: #%1s">%2s</span>',
						$topic_data['forum_solve_color'],
						$topic_data['forum_solve_text']
					);
				}
				else
				{
					$post_row['POST_SUBJECT'] .= $topic_data['forum_solve_text'];
				}
			}
			else
			{
				// TODO: Rewrite this from 3.0-compat to 3.1-compat code, it doesn't work currently.
				//$post_row['POST_SUBJECT'] .= $this->user->img('images/icon_topic_solved_post.png', 'TOPIC_SOLVED');

				// Fallback for now
				$post_row['POST_SUBJECT'] .= sprintf(
					'<span style="color: #00CC00;">%2s</span>', '[SOLVED]'
				);
			}
		}

		$event['post_row'] = $post_row;
	}
}