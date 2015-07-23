<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/tests/event
 */

namespace tierra\topicsolved\tests\event;

use tierra\topicsolved\event\main_listener;
use tierra\topicsolved\topicsolved;

/**
 * Test all tierra\topicsolved\event\main_listener events.
 *
 * @package tierra/topicsolved/tests/event
 */
class main_listener_test extends \phpbb_test_case
{
	/* @var \tierra\topicsolved\topicsolved */
	protected $topicsolved;

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/* @var \tierra\topicsolved\event\main_listener */
	protected $main_listener;

	/**
	 * Configure the test environment.
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->topicsolved = $this->getMockBuilder('\tierra\topicsolved\topicsolved')
			->disableOriginalConstructor()->getMock();
		$this->helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()->getMock();
		$this->template = $this->getMockBuilder('\phpbb\template\template')->getMock();

		$this->main_listener = new main_listener(
			$this->topicsolved, $this->helper, $this->template
		);
	}

	/**
	 * Test the event listener is created correctly.
	 */
	public function test_creation()
	{
		$this->assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->main_listener);
	}

	/**
	 * Test the event listener is subscribing to correct events.
	 */
	public function test_getSubscribedEvents()
	{
		$this->assertEquals(array(
			'core.viewforum_modify_topicrow',
			'core.viewforum_get_topic_ids_data',
			'core.mcp_view_forum_modify_topicrow',
			'core.search_get_posts_data',
			'core.search_get_topic_data',
			'core.search_modify_tpl_ary',
			'core.viewtopic_assign_template_vars_before',
			'core.viewtopic_modify_post_row',
		), array_keys(main_listener::getSubscribedEvents()));
	}

	/**
	 * Trigger forum data event to pre-fill forum settings.
	 */
	private function set_forum_settings($settings)
	{
		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.viewforum_get_topic_ids_data',
			array($this->main_listener, 'viewforum_get_topic_ids_data'));

		$event = new \phpbb\event\data(array('forum_data' => array(
			'forum_allow_solve'   => $settings[0],
			'forum_allow_unsolve' => $settings[1],
			'forum_lock_solved'   => $settings[2],
			'forum_solve_text'    => $settings[3],
			'forum_solve_color'   => $settings[4]
		)));

		$dispatcher->dispatch('core.viewforum_get_topic_ids_data', $event);
	}

	/**
	 * Data set for test_modify_topicrow.
	 *
	 * @return array Array of test data.
	 */
	public function modify_topicrow_data()
	{
		return array(
			array(
				array(
					topicsolved::TOPIC_SOLVED_YES,
					topicsolved::TOPIC_SOLVED_YES,
					0, '', ''
				),
				array('TOPIC_TITLE' => 'Test Topic'),
				array(
					'forum_id' => 1,
					'topic_id' => 1,
					'topic_type' => POST_NORMAL,
					'topic_solved' => 0
				),
				'Test Topic'
			),
			array(
				array(
					topicsolved::TOPIC_SOLVED_YES,
					topicsolved::TOPIC_SOLVED_YES,
					0, '', ''
				),
				array('TOPIC_TITLE' => 'Test Topic'),
				array(
					'forum_id' => 1,
					'topic_id' => 1,
					'topic_type' => POST_NORMAL,
					'topic_solved' => 1
				),
				'Test Topic&nbsp;<a href="./viewtopic.php?f=1&amp;t=1&amp;p=1#p1" title="Topic is solved"><span class="imageset icon_solved_list" title="Topic is solved">Topic is solved</span></a>'
			),
		);
	}

	/**
	 * Test the modify_topicrow event.
	 *
	 * @dataProvider modify_topicrow_data
	 */
	public function test_modify_topicrow($settings, $topic_row, $row, $expected)
	{
		$this->set_forum_settings($settings);

		$this->topicsolved->method('get_link_to_post')
			->will($this->returnValueMap(array(
				array(1, 1, 1, './viewtopic.php?f=1&t=1&p=1#p1'),
			)));

		$this->topicsolved->method('image')
			->will($this->returnValueMap(array(
				array('list', 'TOPIC_SOLVED', './viewtopic.php?f=1&t=1&p=1#p1',
					'<a href="./viewtopic.php?f=1&amp;t=1&amp;p=1#p1" title="Topic is solved"><span class="imageset icon_solved_list" title="Topic is solved">Topic is solved</span></a>'),
			)));

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.viewforum_modify_topicrow',
			array($this->main_listener, 'modify_topicrow'));

		$event = new \phpbb\event\data(compact(array('topic_row', 'row')));
		$dispatcher->dispatch('core.viewforum_modify_topicrow', $event);
		$data = $event->get_data();

		$this->assertArrayHasKey('TOPIC_TITLE', $data['topic_row']);
		$this->assertContains($expected, $data['topic_row']['TOPIC_TITLE']);
	}
}
