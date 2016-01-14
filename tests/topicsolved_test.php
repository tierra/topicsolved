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

use tierra\topicsolved\topicsolved;

/**
 * Test topicsolved class.
 *
 * @package tierra/topicsolved/tests
 */
class topicsolved_test extends \phpbb_database_test_case
{
	/** @var \tierra\topicsolved\topicsolved */
	protected $topicsolved;

	/** @var \phpbb\user|\PHPUnit_Framework_MockObject_MockObject */
	protected $user;

	/** @var \phpbb\auth\auth|\PHPUnit_Framework_MockObject_MockObject */
	protected $auth;

	/** @var \phpbb\event\dispatcher|\PHPUnit_Framework_MockObject_MockObject */
	protected $dispatcher;

	/**
	 * Configure the test environment.
	 *
	 * @return void
	 */
	public function setUp()
	{
		global $phpbb_root_path, $phpEx;

		parent::setUp();

		$this->user = $this->getMock('\phpbb\user', array(), array('\phpbb\datetime'));
		$this->auth = $this->getMock('\phpbb\auth\auth');
		$this->dispatcher = $this->getMock('\phpbb\event\dispatcher');

		$this->topicsolved = new topicsolved(
			$this->new_dbal(), $this->user, $this->auth, $this->dispatcher, $phpbb_root_path, $phpEx
		);
	}

	/**
	 * Load required fixtures.
	 *
	 * @return mixed
	 */
	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/topicsolved.xml');
	}

	/**
	 * Ensure regular user can only lock own posts.
	 */
	public function test_user_can_only_lock_own_post()
	{
		$this->auth->expects($this->exactly(2))->method('acl_get')
			->withConsecutive(array('m_lock', 1), array('f_user_lock', 1))
			->willReturn(false);

		$this->assertFalse($this->topicsolved->user_can_lock_post(1));
	}

	/**
	 * Ensure regular user can lock their own posts.
	 */
	public function test_user_can_lock_own_post()
	{
		$this->auth->expects($this->exactly(2))->method('acl_get')
			->willReturnMap(array(
				array('m_lock', 1, false),
				array('f_user_lock', 1, true))
			);

		$this->assertTrue($this->topicsolved->user_can_lock_post(1));
	}

	/**
	 * Ensure moderators can lock posts.
	 */
	public function test_moderator_can_lock_post()
	{
		$this->auth->expects($this->once())->method('acl_get')
			->with('m_lock', 1)->willReturn(true);

		$this->assertTrue($this->topicsolved->user_can_lock_post(1));
	}

	/**
	 * Data set for test_image
	 *
	 * @return array
	 */
	public function image_test_data()
	{
		return array(
			array('head', 'TOPIC_SOLVED', 'test.php',
				'<a href="test.php" title="TOPIC_SOLVED"><img src="" /></a>'),
			array('list', 'T<>""S', '/anchor/test.php',
				'<a href="/anchor/test.php" title="T&lt;&gt;&quot;&quot;S"><img src="" /></a>'),
			array('post', 'TOPIC_SOLVED', '//example.com/test.php',
				'<a href="//example.com/test.php" title="TOPIC_SOLVED"><img src="" /></a>'),
			array('head', '', 'http://example.com/',
				'<a href="http://example.com/"><img src="" /></a>'),
			array('list', 'TOPIC_SOLVED', 'https://example.com',
				'<a href="https://example.com" title="TOPIC_SOLVED"><img src="" /></a>'),
			array('post', '', 'test.php?f=1&s=two%20words',
				'<a href="test.php?f=1&amp;s=two%20words"><img src="" /></a>'),
		);
	}

	/**
	 * Ensure proper image markup is being generated.
	 *
	 * @param string $type One of "head", "list", or "post".
	 * @param string $alt Language code for title and alternative text.
	 * @param string $url Optional link to solved post.
	 * @param string $expected Result expected from image() call.
	 *
	 * @dataProvider image_test_data
	 */
	public function test_image($type, $alt, $url, $expected)
	{
		$this->user->expects($this->any())->method('img')
			->willReturn('<img src="" />');
		$this->user->expects($this->any())->method('lang')
			->will($this->returnArgument(0));

		$this->assertEquals($expected, $this->topicsolved->image($type, $alt, $url));
	}
}
