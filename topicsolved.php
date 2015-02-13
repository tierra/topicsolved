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
 * Core topic solved functionality used throughout the extension.
 *
 * @package tierra/topicsolved
 */
class topicsolved
{
	/**
	 * Topic starter and moderators can mark topics as solved.
	 */
	const TOPIC_SOLVED_YES = 1;

	/**
	 * Only moderators can mark topics as solved.
	 */
	const TOPIC_SOLVED_MOD = 2;
}
