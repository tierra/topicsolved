<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/tests/controller
 */

namespace tierra\topicsolved\tests\controller;

require_once dirname(__FILE__) . '/../../../../../includes/functions.php';

use tierra\topicsolved\controller\main_controller;
use tierra\topicsolved\topicsolved;

/**
 * Test all tierra\topicsolved\controller\main_controller actions.
 *
 * @package tierra/topicsolved/tests/controller
 */
class main_controller_test extends \phpbb_database_test_case
{
	/* @var \tierra\topicsolved\topicsolved */
	protected $topicsolved;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/**
	 * Define the extension to be tested.
	 *
	 * @return string[]
	 */
	static protected function setup_extensions()
	{
		return array('tierra/topicsolved');
	}

	/**
	 * Load required fixtures.
	 *
	 * @return mixed
	 */
	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/main_controller.xml');
	}

	/**
	 * Configure the test environment.
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->config = new \phpbb\config\config(array());
	}

	/**
	 * Create the main_controller
	 *
	 * @param int $user_id Fixture user ID to use for test request.
	 * @param string $mode Controller action to test.
	 *
	 * @return \tierra\topicsolved\controller\main_controller
	 */
	protected function get_controller($user_id, $mode)
	{
		global $phpbb_dispatcher, $phpbb_root_path, $phpEx;

		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		$user = $this->getMock('\phpbb\user', array(), array('\phpbb\datetime'));
		$user->data['user_id'] = $user_id;

		$auth = $this->getMock('\phpbb\auth\auth');

		$this->topicsolved = new topicsolved($this->new_dbal(), $user, $auth, $phpbb_root_path, $phpEx);

		$request = $this->getMock('\phpbb\request\request');
		$request->expects($this->any())
			->method('variable')
			->with($this->anything())
			->will($this->returnValueMap(
				array(
					array('hash', '', false, \phpbb\request\request_interface::REQUEST, generate_link_hash($mode))
				)
			));

		// Mock the controller helper and return render response object
		$controller_helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()
			->getMock();
		$controller_helper->expects($this->any())
			->method('render')
			->willReturnCallback(function($template_file, $page_title = '', $status_code = 200, $display_online_list = false)
				{
					return new \Symfony\Component\HttpFoundation\Response($template_file, $status_code);
				}
			);

		// Mock the template
		$template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();

		return new main_controller($this->topicsolved);
	}

	/**
	 * Test the controller response under normal conditions.
	 */
	public function test_controller()
	{
		$this->markTestIncomplete(
			"Can't finish this test until migrations are implemented."
		);

		//$controller = $this->get_controller(1, 'mark');

		//$response = $controller->mark('solved', 1);

		//$this->assertInstanceOf('\Symfony\Component\HttpFoundation\RedirectResponse', $response);
		//$this->assertEquals(302, $response->getStatusCode());
		//$this->assertEquals($content, $response->getContent());
	}
}
