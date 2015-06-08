<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 * Added by zouloufr
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/migrations/v20x
 */

namespace tierra\topicsolved\migrations\v20x;

/**
 * First official migration for the Topic Solved extension.
 *
 * This matches the latest SQL changes from version 1.4.5 of the old MOD:
 *
 * <code>
 * ALTER TABLE phpbb_forums ADD forum_allow_solve tinyint(1) UNSIGNED NOT NULL DEFAULT 0;
 * ALTER TABLE phpbb_forums ADD forum_allow_unsolve tinyint(1) UNSIGNED NOT NULL DEFAULT 0;
 * ALTER TABLE phpbb_forums ADD forum_lock_solved tinyint(1) UNSIGNED NOT NULL DEFAULT 0;
 * ALTER TABLE phpbb_forums ADD forum_solve_text varchar(25) NULL;
 * ALTER TABLE phpbb_forums ADD forum_solve_color varchar(7) NOT NULL DEFAULT '';
 * ALTER TABLE phpbb_topics ADD topic_solved mediumint(8) UNSIGNED NOT NULL DEFAULT 0;
 * </code>
 *
 * @package tierra\topicsolved\migrations\v20x
 */
class initial_install extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v313');
	}

	public function effectively_installed()
	{
		return $this->db_tools->sql_column_exists(
			$this->table_prefix . 'topics', 'topic_solved'
		);
	}

	public function update_schema()
	{
		return array(
			'add_columns' => array(
				$this->table_prefix . 'forums' => array(
					'forum_allow_solve'     => array('TINT:1', 0),
					'forum_allow_unsolve'   => array('TINT:1', 0),
					'forum_lock_solved'     => array('TINT:1', 0),
					'forum_solve_text'      => array('VCHAR:25', null),
					'forum_solve_color'     => array('VCHAR:7', ''),
				),
				$this->table_prefix . 'topics' => array(
					'topic_solved'          => array('UINT', 0),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns' => array(
				$this->table_prefix . 'forums' => array(
					'forum_allow_solve',
					'forum_allow_unsolve',
					'forum_lock_solved',
					'forum_solve_text',
					'forum_solve_color',
				),
				$this->table_prefix . 'topics' => array(
					'topic_solved',
				),
			),
		);
	}
}
