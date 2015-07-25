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

/**
 * Helper for event test cases.
 *
 * @package tierra\topicsolved\tests\event
 */
class event_test_case extends \phpbb_test_case
{
	/* @var \Symfony\Component\EventDispatcher\EventDispatcher */
	protected $dispatcher;

	/**
	 * Configure the test environment.
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
	}

	/**
	 * Dispatch a new event using the given event listener.
	 *
	 * @returns array Output of event data.
	 */
	protected function dispatch($listener, $input_data)
	{
		$this->dispatcher->addListener('event_test_case', $listener);
		$event = new \phpbb\event\data($input_data);
		$this->dispatcher->dispatch('event_test_case', $event);
		$this->dispatcher->removeListener('event_test_case', $listener);
		return $event->get_data();
	}
}
