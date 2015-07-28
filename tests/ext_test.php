<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/tests
 */

namespace tierra\topicsolved\tests;

use tierra\topicsolved\ext;

/**
 * Test ext base class.
 *
 * @package tierra/topicsolved/tests
 */
class ext_test extends \phpbb_test_case
{
	/** @var \Symfony\Component\DependencyInjection\ContainerInterface|\PHPUnit_Framework_MockObject_MockObject */
	protected $container;

	/** @var \phpbb\finder|\PHPUnit_Framework_MockObject_MockObject */
	protected $extension_finder;

	/** @var \phpbb\db\migrator|\PHPUnit_Framework_MockObject_MockObject */
	protected $migrator;

	/**
	 * Configure the test environment.
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		// Normally loaded by phpBB init, but not in tests.
		require_once dirname(__FILE__) . '/../../../../includes/functions.php';

		$this->container = $this->getMock('\Symfony\Component\DependencyInjection\ContainerInterface');

		$this->extension_finder = $this->getMockBuilder('\phpbb\finder')
			->disableOriginalConstructor()->getMock();

		$this->migrator = $this->getMockBuilder('\phpbb\db\migrator')
			->disableOriginalConstructor()->getMock();
	}

	/**
	 * Data set for test_ext
	 *
	 * @return array
	 */
	public function ext_test_data()
	{
		$req_version = ext::PHPBB_MIN_VERSION;

		return array(
			// Versions less than the requirement
			array('3.1', false),
			array('3.1.0', false),
			array('3.1.1', false),
			array('3.1.1.1', false),
			array($req_version . '-A1', false),
			array($req_version . '-RC1', false),
			array($req_version . '-DEV', false),
			// Versions equal to or greater than the requirement
			array($req_version, true),
			array($req_version . '-p2', true),
			array($req_version . '.1', true),
			array('3.2', true),
			array('3.2.0', true),
		);
	}

	/**
	 * Test the extension can only be enabled when the minimum
	 * phpBB version requirement is satisfied.
	 *
	 * @param $version
	 * @param $expected
	 *
	 * @dataProvider ext_test_data
	 */
	public function test_ext($version, $expected)
	{
		// Instantiate config object and set config version
		$config = new \phpbb\config\config(array(
			'version' => $version,
		));

		// Mocked container should return the config object
		// when encountering $this->container->get('config')
		$this->container->expects($this->any())
			->method('get')
			->with('config')
			->will($this->returnValue($config));

		$ext = new ext($this->container, $this->extension_finder, $this->migrator, 'tierra/topicsolved', '');

		$this->assertSame($expected, $ext->is_enableable());
	}
}
