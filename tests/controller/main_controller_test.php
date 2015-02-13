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

/**
 * Test all tierra\topicsolved\controller\main_controller actions.
 *
 * @package tierra/topicsolved/tests/controller
 */
class main_controller_test extends \phpbb_database_test_case
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/**
	 * Define the extension to be tested.
	 *
	 * @return array
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
		//return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/main_controller.xml');
	}

	/**
	 * Configure the test environment.
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();
		$this->config = new \phpbb\config\config(array());
	}
}
