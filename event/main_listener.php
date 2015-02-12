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

	/**
	 * Constructor
	 *
	 * @param \phpbb\controller\helper	$helper		Controller helper object
	 * @param \phpbb\template			$template	Template object
	 */
	public function __construct(
		\phpbb\controller\helper $helper,
		\phpbb\template\template $template)
	{
		$this->helper = $helper;
		$this->template = $template;
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
	 * Assign topic solved data for each topic to the view for rendering.
	 *
	 * @param \phpbb\event\data $event Topic row data being rendered.
	 *
	 * @return void
	 */
	public function viewforum_modify_topicrow($event)
	{
		if ($event['row']['topic_solved'] && $event['row']['topic_type'] != POST_GLOBAL)
		{
			//(($forum_data['forum_solve_text']) ? $forum_data['forum_solve_text'] : $user->img('icon_topic_solved_list', 'TOPIC_SOLVED'))

			$event['topic_row']['SOLVED_TOPIC'] = '';
			$event['topic_row']['U_SOLVED_TOPIC'] = '';
		}
	}
}