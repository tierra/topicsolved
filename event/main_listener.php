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
	/** @var \tierra\topicsolved\topicsolved */
	protected $topicsolved;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var array Forum topic solved settings for events missing them. */
	protected $forum_data = array();

	/**
	 * Constructor
	 *
	 * @param \tierra\topicsolved\topicsolved $topicsolved Core topicsolved helper.
	 * @param \phpbb\controller\helper $helper Controller helper object
	 * @param \phpbb\template\template $template Template object
	 */
	public function __construct(
		topicsolved $topicsolved,
		\phpbb\controller\helper $helper,
		\phpbb\template\template $template)
	{
		$this->topicsolved = $topicsolved;
		$this->helper = $helper;
		$this->template = $template;
	}

	/**
	 * Assign functions defined in this class to event listeners in core.
	 *
	 * @return array
	 */
	public static function getSubscribedEvents()
	{
		return array(
			'core.viewforum_modify_topicrow'
				=> 'modify_topicrow',
			'core.viewforum_get_topic_ids_data'
				=> 'viewforum_get_topic_ids_data',
			'core.mcp_view_forum_modify_topicrow'
				=> 'modify_topicrow',
			'core.search_get_posts_data'
				=> 'search_get_posts_data',
			'core.search_get_topic_data'
				=> 'search_get_topic_data',
			'core.search_modify_tpl_ary'
				=> 'search_modify_tpl_ary',
			'core.viewtopic_assign_template_vars_before'
				=> 'viewtopic_assign_template_vars_before',
			'core.viewtopic_modify_post_row' => array(
				array('viewtopic_modify_post_row_button', 0),
				array('viewtopic_modify_post_row_subject', 0),
			)
		);
	}

	/**
	 * Append solved indicator to forum topics in viewforum and MCP.
	 *
	 * Events:
	 * - core.viewforum_modify_topicrow
	 * - core.mcp_view_forum_modify_topicrow
	 *
	 * @param \phpbb\event\data $event Topic row data being rendered.
	 *
	 * @return void
	 */
	public function modify_topicrow($event)
	{
		$topic_row = $event['topic_row']; // Template variables

		$title = $this->get_solved_topic_title($event['row']);
		$topic_row['TOPIC_TITLE'] .= $title;

		$event['topic_row'] = $topic_row;
	}

	/**
	 * @param \phpbb\event\data $event
	 */
	public function viewforum_get_topic_ids_data($event)
	{
		$data = $event['forum_data'];

		$this->forum_data['forum_allow_solve']      = $data['forum_allow_solve'];
		$this->forum_data['forum_allow_unsolve']    = $data['forum_allow_unsolve'];
		$this->forum_data['forum_lock_solved']      = $data['forum_lock_solved'];
		$this->forum_data['forum_solve_text']       = $data['forum_solve_text'];
		$this->forum_data['forum_solve_color']      = $data['forum_solve_color'];
	}

	/**
	 * Configure post search results to fetch forum topic solved settings.
	 *
	 * @param \phpbb\event\data $event Search query to be run.
	 *
	 * @return void
	 */
	public function search_get_posts_data($event)
	{
		$sql_array = $event['sql_array'];
		$sql_array['SELECT'] .= ', f.forum_solve_text, f.forum_solve_color';
		$event['sql_array'] = $sql_array;
	}

	/**
	 * Configure topic search results to fetch forum topic solved settings.
	 *
	 * @param \phpbb\event\data $event Search query to be run.
	 *
	 * @return void
	 */
	public function search_get_topic_data($event)
	{
		$sql_select = $event['sql_select'];
		$sql_select .= ', f.forum_solve_text, f.forum_solve_color';
		$event['sql_select'] = $sql_select;
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

		if (!empty($this->forum_data))
		{
			$row = array_merge($row, $this->forum_data);
		}

		$solved_url = $this->topicsolved->get_link_to_post(
			$row['forum_id'], $row['topic_id'], $row['topic_solved']);

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
				$title = sprintf($markup, htmlspecialchars($solved_url, ENT_QUOTES, 'UTF-8'),
					"color: #{$row['forum_solve_color']};", $row['forum_solve_text']);
			}
			else
			{
				$title = sprintf($markup, htmlspecialchars($solved_url, ENT_QUOTES, 'UTF-8'),
					'', $row['forum_solve_text']);
			}
		}
		else
		{
			$title = '&nbsp;' . $this->topicsolved->image('list', 'TOPIC_SOLVED', $solved_url);
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
			$solved_url = $this->topicsolved->get_link_to_post(
				$event['forum_id'], $event['topic_id'], $topic_data['topic_solved']);

			$this->template->assign_var('U_SOLVED_POST', $solved_url);

			if (!empty($topic_data['forum_solve_text']))
			{
				$this->template->assign_var('TOPIC_SOLVED_TITLE', $topic_data['forum_solve_text']);
			}
			else
			{
				$this->template->assign_var('TOPIC_SOLVED_IMAGE',
					$this->topicsolved->image('head', 'TOPIC_SOLVED')
				);
			}

			if (!empty($topic_data['forum_solve_color']))
			{
				$this->template->assign_var('TOPIC_SOLVED_STYLE', $topic_data['forum_solve_color']);
			}
		}
	}

	/**
	 * Assign topic solved post button data in topic view.
	 *
	 * @param \phpbb\event\data $event Post data being rendered.
	 *
	 * @return void
	 */
	public function viewtopic_modify_post_row_button($event)
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

		$event['post_row'] = $post_row;
	}

	/**
	 * Assign topic solved post subject in topic view.
	 *
	 * @param \phpbb\event\data $event Post data being rendered.
	 *
	 * @return void
	 */
	public function viewtopic_modify_post_row_subject($event)
	{
		$topic_data = $event['topic_data'];
		$post_row = $event['post_row'];

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
				$post_row['POST_SUBJECT'] .= $this->topicsolved->image('post', 'TOPIC_SOLVED');
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
		if (!$topic_data['topic_solved'] &&
			$this->topicsolved->user_can_solve_post('solved', $topic_data))
		{
			return $this->helper->route('tierra_topicsolved_controller_mark',
				array(
					'solve' => 'solved',
					'post_id' => (int) $post_id,
				)
			);
		}
		else if ($topic_data['topic_solved'] &&
			$this->topicsolved->user_can_solve_post('unsolved', $topic_data))
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
