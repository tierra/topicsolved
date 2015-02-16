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
			'core.search_modify_tpl_ary'
			=> 'search_modify_tpl_ary',
			'core.viewtopic_assign_template_vars_before'
				=> 'viewtopic_assign_template_vars_before',
			'core.viewtopic_modify_post_row'
				=> 'viewtopic_modify_post_row',
		);
	}

	/**
	 * Append solved indicator to forum topics.
	 *
	 * @param \phpbb\event\data $event Topic row data being rendered.
	 *
	 * @return void
	 */
	public function viewforum_modify_topicrow($event)
	{
		$topic_row = $event['topic_row']; // Template variables

		$title = $this->get_solved_topic_title($event['row']);
		$topic_row['TOPIC_TITLE'] .= $title;

		$event['topic_row'] = $topic_row;
	}

	/**
	 * Append solved indicator to posts and topics in search results.
	 *
	 * @param \phpbb\event\data $event Search results data being rendered.
	 *
	 * @return void
	 */
	public function search_modify_tpl_ary($event)
	{
		$tpl_ary = $event['tpl_ary']; // Template variables

		$title = $this->get_solved_topic_title($event['row'], $event['show_results']);
		$tpl_ary['TOPIC_TITLE'] .= $title;

		if (!empty($tpl_ary['POST_SUBJECT']))
		{
			$tpl_ary['POST_SUBJECT'] .= $title;
		}

		$event['tpl_ary'] = $tpl_ary;
	}

	/**
	 * Format and return topic solved data for templates in topic list views.
	 *
	 * @param array $row Raw topic row data from database.
	 * @param string $style Style indicator for "posts" or "topics" pages.
	 *
	 * @return string Solved indicator markup to append to title.
	 */
	protected function get_solved_topic_title($row, $style = 'topics')
	{
		if (empty($row['topic_solved']) || $row['topic_type'] == POST_GLOBAL)
		{
			return '';
		}

		// TODO: Add support for custom text/icon solved indicator.
		// TODO: Add support for custom style.

		$solved_url = append_sid("{$this->root_path}viewtopic.{$this->php_ext}",
			"f={$row['forum_id']}&amp;t={$row['topic_id']}&amp;p={$row['topic_solved']}"
			) . '#p' . $row['topic_solved'];

		$markup = '</a>&nbsp;<a href="%s"';

		if ($style == 'topics')
		{
			$markup .= ' class="topictitle" style="%s">%s';
		}
		else
		{
			$markup .= ' style="%s">%s';
		}

		if (!empty($row['forum_solve_text']))
		{
			if (!empty($row['forum_solve_color']))
			{
				$title = sprintf($markup, $solved_url,
					"color: #{$row['forum_solve_color']};", $row['forum_solve_text']);
			}
			else
			{
				$title = sprintf($markup, $solved_url, '', $row['forum_solve_text']);
			}
		}
		else
		{
			// TODO: Rewrite this from 3.0-compat to 3.1-compat code, it doesn't work currently.
			//$topic_row['TOPIC_TITLE'] .= sprintf($link_html, $solved_post_url, '',
			//	$this->user->img('images/icon_topic_solved_post.png', 'TOPIC_SOLVED'));

			// Fallback for now
			$title = sprintf($markup, $solved_url, 'color: #00CC00;', '[SOLVED]');
		}

		return $title;
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

		$url_set_solved = $this->get_url_set_solved(
			$topic_data, $event['row']['post_id']);

		if (!empty($url_set_solved))
		{
			$post_row['U_SET_SOLVED'] = $url_set_solved;
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

	/**
	 * Returns URL to action for setting a post as solved/unsolved.
	 *
	 * @param array $topic_data Forum topic data.
	 * @param string $post_id Post ID
	 *
	 * @return string URL to action for solving/unsolving post.
	 */
	protected function get_url_set_solved($topic_data, $post_id)
	{
		if ($this->topicsolved->user_can_solve_post('solved', $topic_data) &&
			!$topic_data['topic_solved'])
		{
			return $this->helper->route('tierra_topicsolved_controller_mark',
				array(
					'solve' => 'solved',
					'post_id' => (int) $post_id,
				)
			);
		}
		else if ($this->topicsolved->user_can_solve_post('unsolved', $topic_data) &&
			$topic_data['topic_solved'])
		{
			return $this->helper->route('tierra_topicsolved_controller_mark',
				array(
					'solve' => 'unsolved',
					'post_id' => (int) $post_id,
				)
			);
		}

		return '';
	}
}
