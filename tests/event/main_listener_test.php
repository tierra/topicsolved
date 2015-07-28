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
class main_listener_test extends event_test_case
{
	/** @var \tierra\topicsolved\topicsolved|\PHPUnit_Framework_MockObject_MockObject */
	protected $topicsolved;

	/** @var \phpbb\controller\helper|\PHPUnit_Framework_MockObject_MockObject */
	protected $helper;

	/** @var \phpbb\template\template|\PHPUnit_Framework_MockObject_MockObject */
	protected $template;

	/** @var \tierra\topicsolved\event\main_listener */
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
	 *
	 * @param array $settings Forum settings to pre-fill.
	 */
	private function set_forum_settings($settings)
	{
		$this->dispatch(
			array($this->main_listener, 'viewforum_get_topic_ids_data'),
			array('forum_data' => array(
				'forum_allow_solve'   => $settings[0],
				'forum_allow_unsolve' => $settings[1],
				'forum_lock_solved'   => $settings[2],
				'forum_solve_text'    => $settings[3],
				'forum_solve_color'   => $settings[4]
			))
		);
	}

	/**
	 * Mock the topicsolved::get_link_to_post method.
	 */
	private function mock_get_link_to_post()
	{
		$this->topicsolved->expects($this->any())->method('get_link_to_post')
			->will($this->returnValueMap(array(
				array(1, 1, 1, './viewtopic.php?f=1&t=1&p=1#p1'),
			)));
	}

	/**
	 * Data set for test_modify_topicrow.
	 *
	 * @return array Array of test data.
	 */
	public function modify_topicrow_data()
	{
		return array(
			array('Test Topic', '', 'Test Topic'),
			array('Test Topic', 1, 'Test Topic&nbsp;<a href="./viewtopic.php?f=1&amp;t=1&amp;p=1#p1" title="Topic is solved"><span class="imageset icon_solved_list" title="Topic is solved">Topic is solved</span></a>'),
		);
	}

	/**
	 * Test the modify_topicrow event.
	 *
	 * @param string $topic_title Topic title to test.
	 * @param string|int $topic_solved Solve post for topic.
	 * @param string $expected Expected topic title to return.
	 *
	 * @dataProvider modify_topicrow_data
	 */
	public function test_modify_topicrow($topic_title, $topic_solved, $expected)
	{
		$this->set_forum_settings(array(
			topicsolved::TOPIC_SOLVED_YES,
			topicsolved::TOPIC_SOLVED_YES,
			0, '', ''
		));

		$this->mock_get_link_to_post();
		$this->topicsolved->expects($this->any())->method('image')
			->will($this->returnValueMap(array(
				array('list', 'TOPIC_SOLVED', './viewtopic.php?f=1&t=1&p=1#p1',
					'<a href="./viewtopic.php?f=1&amp;t=1&amp;p=1#p1" title="Topic is solved"><span class="imageset icon_solved_list" title="Topic is solved">Topic is solved</span></a>'),
			)));

		$data = $this->dispatch(
			array($this->main_listener, 'modify_topicrow'),
			array(
				'topic_row' => array('TOPIC_TITLE' => $topic_title),
				'row' => array(
					'forum_id' => 1,
					'topic_id' => 1,
					'topic_type' => POST_NORMAL,
					'topic_solved' => $topic_solved
				)
			)
		);

		$this->assertArrayHasKey('TOPIC_TITLE', $data['topic_row']);
		$this->assertContains($expected, $data['topic_row']['TOPIC_TITLE']);
	}

	/**
	 * Test forum settings are retrieved in search queries.
	 */
	public function test_search_data()
	{
		$get_posts = $this->dispatch(
			array($this->main_listener, 'search_get_posts_data'),
			array('sql_array' => array('SELECT' => ''))
		);
		$this->assertContains('f.forum_solve_text', $get_posts['sql_array']['SELECT']);
		$this->assertContains('f.forum_solve_color', $get_posts['sql_array']['SELECT']);

		$get_topic = $this->dispatch(
			array($this->main_listener, 'search_get_topic_data'),
			array('sql_select' => array('SELECT' => ''))
		);
		$this->assertContains('f.forum_solve_text', $get_topic['sql_select']);
		$this->assertContains('f.forum_solve_color', $get_topic['sql_select']);
	}

	/**
	 * Data set for search_modify_tpl_ary.
	 *
	 * @return array Array of test data.
	 */
	public function search_modify_tpl_ary_data()
	{
		return array(
			array(
				'First Title', '', 1, 'topics', '',
				'First Title</a>&nbsp;<a href="./viewtopic.php?f=1&amp;t=1&amp;p=1#p1" class="topictitle" style="">[SOLVED]', ''
			),
			array(
				'Second Title', 'Post Subject', 1, 'posts', '00ff00',
				'Second Title</a>&nbsp;<a href="./viewtopic.php?f=1&amp;t=1&amp;p=1#p1" style="color: #00ff00;">[SOLVED]',
				'Post Subject</a>&nbsp;<a href="./viewtopic.php?f=1&amp;t=1&amp;p=1#p1" style="color: #00ff00;">[SOLVED]'
			),
			array(
				'Third Title', '', 0, 'topics', '', 'Third Title', ''
			)
		);
	}

	/**
	 * Test the search_modify_tpl_ary event.
	 *
	 * @dataProvider search_modify_tpl_ary_data
	 */
	public function test_search_modify_tpl_ary(
		$topic_title, $post_subject, $topic_solved, $show_results,
		$forum_solve_color, $expected_topic_title, $expected_post_subject)
	{
		$this->mock_get_link_to_post();

		$input = array(
			'tpl_ary' => array('TOPIC_TITLE' => $topic_title),
			'row' => array(
				'forum_id' => 1,
				'topic_id' => 1,
				'post_id' => 1,
				'topic_type' => POST_NORMAL,
				'topic_solved' => $topic_solved,
				'forum_solve_text' => '[SOLVED]',
				'forum_solve_color' => $forum_solve_color
			),
			'show_results' => $show_results
		);

		if (!empty($post_subject))
		{
			$input['tpl_ary']['POST_SUBJECT'] = $post_subject;
		}

		$data = $this->dispatch(
			array($this->main_listener, 'search_modify_tpl_ary'), $input
		);

		$this->assertArrayHasKey('TOPIC_TITLE', $data['tpl_ary']);
		$this->assertEquals($expected_topic_title, $data['tpl_ary']['TOPIC_TITLE']);

		if (!empty($expected_post_subject))
		{
			$this->assertArrayHasKey('POST_SUBJECT', $data['tpl_ary']);
			$this->assertEquals($expected_post_subject, $data['tpl_ary']['POST_SUBJECT']);
		}
		else
		{
			$this->assertArrayNotHasKey('POST_SUBJECT', $data['tpl_ary']);
		}
	}

	/**
	 * Data set for test_viewtopic_assign_template_vars_before.
	 *
	 * @return array Array of test data.
	 */
	public function viewtopic_assign_template_vars_before_data()
	{
		return array(
			array(0, POST_NORMAL, topicsolved::TOPIC_SOLVED_YES, '', ''),
			array(1, POST_NORMAL, topicsolved::TOPIC_SOLVED_YES, '', ''),
			array(1, POST_GLOBAL, topicsolved::TOPIC_SOLVED_YES, '', ''),
			array(1, POST_NORMAL, topicsolved::TOPIC_SOLVED_NO, '', ''),
			array(1, POST_NORMAL, topicsolved::TOPIC_SOLVED_YES, 'SOLVED', ''),
			array(1, POST_NORMAL, topicsolved::TOPIC_SOLVED_YES, 'SOLVED', '00ff00'),
		);
	}

	/**
	 * Test the viewtopic_assign_template_vars_before event.
	 *
	 * @dataProvider viewtopic_assign_template_vars_before_data
	 */
	public function test_viewtopic_assign_template_vars_before(
		$topic_solved, $topic_type,
		$forum_allow_solve, $forum_solve_text, $forum_solve_color)
	{
		$this->mock_get_link_to_post();

		if ($topic_solved && $forum_allow_solve && $topic_type != POST_GLOBAL)
		{
			$calls = array(array('U_SOLVED_POST', $this->anything()));

			if (!empty($forum_solve_text))
			{
				$calls[] = array('TOPIC_SOLVED_TITLE', $forum_solve_text);
			}
			else
			{
				$calls[] = array('TOPIC_SOLVED_IMAGE', $this->anything());
			}

			if (!empty($forum_solve_color))
			{
				$calls[] = array('TOPIC_SOLVED_STYLE', $forum_solve_color);
			}

			$method = $this->template->expects($this->exactly(count($calls)))->method('assign_var');
			call_user_func_array(array($method, 'withConsecutive'), $calls);
		}
		else
		{
			$this->template->expects($this->never())->method('assign_var')
				->with($this->anything(), $this->anything());
		}

		$this->dispatch(
			array($this->main_listener, 'viewtopic_assign_template_vars_before'),
			array(
				'forum_id' => 1,
				'topic_id' => 1,
				'topic_data' => array(
					'topic_solved' => $topic_solved,
					'topic_type' => $topic_type,
					'forum_allow_solve' => $forum_allow_solve,
					'forum_solve_text' => $forum_solve_text,
					'forum_solve_color' => $forum_solve_color
				)
			)
		);
	}
}
