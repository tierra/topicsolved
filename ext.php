<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved
 */

namespace tierra\topicsolved;

/**
 * Extension enable, disable, and purge triggers.
 *
 * @package tierra/topicsolved
 */
class ext extends \phpbb\extension\base
{
	/** Minimum PHP version. */
	const PHP_MIN_VERSION = '5.3.10';

	/** Minimum phpBB version. */
	const PHPBB_MIN_VERSION = '3.1.3';

	/**
	 * Enable extension if requirements are met.
	 *
	 * @return bool
	 */
	public function is_enableable()
	{
		$config = $this->container->get('config');
		return
			version_compare(PHP_VERSION, self::PHP_MIN_VERSION, '>=') &&
			version_compare($config['version'], self::PHPBB_MIN_VERSION, '>=');
	}
}
