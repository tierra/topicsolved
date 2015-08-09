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

use tierra\topicsolved\event\acp_forums;
use tierra\topicsolved\topicsolved;

/**
 * Test all tierra\topicsolved\event\acp_forums events.
 *
 * @package tierra/topicsolved/tests/event
 */
class acp_forums_test extends event_test_case
{
	/** @var \tierra\topicsolved\topicsolved|\PHPUnit_Framework_MockObject_MockObject */
	protected $topicsolved;

	/** @var \phpbb\template\template|\PHPUnit_Framework_MockObject_MockObject */
	protected $template;

	/** @var \phpbb\request\request|\PHPUnit_Framework_MockObject_MockObject */
	protected $request;

	/** @var \tierra\topicsolved\event\acp_forums */
	protected $acp_forums;

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
		$this->template = $this->getMock('\phpbb\template\template');
		$this->request = $this->getMock('\phpbb\request\request');

		$this->acp_forums = new acp_forums(
			$this->topicsolved, $this->template, $this->request
		);
	}

	/**
	 * Test the event listener is created correctly.
	 */
	public function test_creation()
	{
		$this->assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->acp_forums);
	}

	/**
	 * Test the event listener is subscribing to correct events.
	 */
	public function test_getSubscribedEvents()
	{
		$this->assertEquals(array(
			'core.acp_manage_forums_initialise_data',
			'core.acp_manage_forums_display_form',
			'core.acp_manage_forums_request_data',
		), array_keys(acp_forums::getSubscribedEvents()));
	}

	/**
	 * Common setting keys used throughout tests.
	 *
	 * @return array
	 */
	private function get_setting_keys()
	{
		return array(
			'forum_allow_solve',
			'forum_allow_unsolve',
			'forum_solve_text',
			'forum_solve_color',
			'forum_lock_solved'
		);
	}

	/**
	 * Test default settings are initialized for form.
	 */
	public function test_acp_manage_forums_initialise_data()
	{
		$setting_keys = $this->get_setting_keys();

		// Ensure settings are added for new forums.
		$data = $this->dispatch(
			array($this->acp_forums, 'acp_manage_forums_initialise_data'),
			array('forum_data' => array(), 'action' => 'add')
		);
		foreach($setting_keys as $key)
		{
			$this->assertArrayHasKey($key, $data['forum_data']);
		}

		// Ensure settings are only initialized for form display, not submit.
		$data = $this->dispatch(
			array($this->acp_forums, 'acp_manage_forums_initialise_data'),
			array('forum_data' => array(), 'action' => 'add', 'update' => true)
		);
		foreach($setting_keys as $key)
		{
			$this->assertArrayNotHasKey($key, $data['forum_data']);
		}
	}

	/**
	 * Data set for test_acp_manage_forums_display_form.
	 *
	 * @return array Array of test data.
	 */
	public function acp_manage_forums_display_form_data()
	{
		return array(
			array(
				array(1, 1),
				array(1, 1),
				array(0, 0),
				array('', ''),
				array('', '')
			),
			array(
				array(0, 0),
				array(0, 0),
				array(1, 1),
				array('[SOLVED]', '[SOLVED]'),
				array('00ff00', '00ff00')
			)
		);
	}

	/**
	 * Test the acp_manage_forums_display_form event.
	 *
	 * @param $allow_solve
	 * @param $allow_unsolve
	 * @param $lock_solved
	 * @param $solve_text
	 * @param $solve_color
	 *
	 * @dataProvider acp_manage_forums_display_form_data
	 */
	public function test_acp_manage_forums_display_form($allow_solve,
		$allow_unsolve, $lock_solved, $solve_text, $solve_color)
	{
		$data = $this->dispatch(
			array($this->acp_forums, 'acp_manage_forums_display_form'),
			array(
				'forum_data' => array(
					'forum_allow_solve'   => $allow_solve[0],
					'forum_allow_unsolve' => $allow_unsolve[0],
					'forum_lock_solved'   => $lock_solved[0],
					'forum_solve_text'    => $solve_text[0],
					'forum_solve_color'   => $solve_color[0]
				),
				'template_data' => array(
					'OUTSIDE_VALUE' => 'test'
				)
			)
		);

		$this->assertEquals($allow_solve[1],   $data['template_data']['S_FORUM_ALLOW_SOLVE']);
		$this->assertEquals($allow_unsolve[1], $data['template_data']['S_FORUM_ALLOW_UNSOLVE']);
		$this->assertEquals($lock_solved[1],   $data['template_data']['S_FORUM_LOCK_SOLVED']);
		$this->assertEquals($solve_text[1],    $data['template_data']['FORUM_SOLVE_TEXT']);
		$this->assertEquals($solve_color[1],   $data['template_data']['FORUM_SOLVE_COLOUR']);

		$this->assertEquals('test', $data['template_data']['OUTSIDE_VALUE']);
	}

	/**
	 * Test forum settings are pulled from request values.
	 */
	public function test_acp_manage_forums_request_data()
	{
		$setting_keys = $this->get_setting_keys();
		$this->request->expects($this->exactly(count($setting_keys)))
			->method('variable')->willReturn('');

		$data = $this->dispatch(
			array($this->acp_forums, 'acp_manage_forums_request_data'),
			array('forum_data' => array())
		);

		foreach($setting_keys as $key)
		{
			$this->assertArrayHasKey($key, $data['forum_data']);
		}
	}
}
