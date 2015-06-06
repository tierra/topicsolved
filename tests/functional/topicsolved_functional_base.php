<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/tests/functional
 */

namespace tierra\topicsolved\tests\functional;

/**
 * @group functional
 */
class topicsolved_functional_base extends \phpbb_functional_test_case
{
	/**
	 * Define the extensions to be tested
	 *
	 * @return array vendor/name of extension(s) to test
	 */
	static protected function setup_extensions()
	{
		return array('tierra/topicsolved');
	}

	/**
	 * Initialize extension for tests.
	 */
	public function setUp()
	{
		parent::setUp();
		$this->purge_cache();
		$this->add_lang_ext('tierra/topicsolved', array(
			'common',
			'info_acp_topicsolved',
		));
	}
}
