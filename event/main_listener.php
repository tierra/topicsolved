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

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Main event listener
 *
 * @package tierra/topicsolved/event
 */
class main_listener implements EventSubscriberInterface
{
	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/** @var string core.root_path */
	protected $root_path;

	/** @var string core.php_ext */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\controller\helper $helper Controller helper object
	 * @param \phpbb\template\template $template Template object
	 * @param string $root_path core.root_path
	 * @param string $php_ext core.php_ext
	 */
	public function __construct(
		\phpbb\controller\helper $helper,
		\phpbb\template\template $template,
		$root_path, $php_ext)
	{
		$this->helper = $helper;
		$this->template = $template;
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
			'core.viewforum_modify_topicrow'	=> 'viewforum_modify_topicrow',
		);
	}

	/**
	 * Assign topic solved view data for each topic.
	 *
	 * @param \phpbb\event\data $event Topic row data being rendered.
	 *
	 * @return void
	 */
	public function viewforum_modify_topicrow($event)
	{
		if ($event['row']['topic_solved'] && $event['row']['topic_type'] != POST_GLOBAL)
		{
			$topic_row = $event['topic_row'];

			// TODO: Add support for custom text/icon solved indicator.
			// TODO: Add support for custom style.
			// <a href="{topicrow.U_SOLVED_TOPIC}" class="topictitle"{topicrow.SOLVED_STYLE}>{topicrow.SOLVED_TOPIC}</a>
			// (($forum_data['forum_solve_text']) ? $forum_data['forum_solve_text'] : $user->img('icon_topic_solved_list', 'TOPIC_SOLVED'))

			$view_topic_url_params = 'f=' . $event['row']['forum_id'] . '&amp;t=' . $event['row']['topic_id'];
			$solved_post_url = append_sid(
					"{$this->root_path}viewtopic.{$this->php_ext}",
					$view_topic_url_params . '&amp;p=' . $event['row']['topic_solved']
				) . '#p' . $event['row']['topic_solved'];

			$topic_row['TOPIC_TITLE'] .= '</a>&nbsp;&nbsp;<a href="' .
				$solved_post_url . '" class="topictitle" style="color: #00AA00;">[SOLVED]';

			$event['topic_row'] = $topic_row;
		}
	}
}