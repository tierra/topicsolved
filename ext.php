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
	/**
	 * Enable extension if phpBB version requirement is met.
	 *
	 * @return bool
	 */
	public function is_enableable()
	{
		$config = $this->container->get('config');

		return version_compare($config['version'], '3.1.3', '>=');
	}
}
