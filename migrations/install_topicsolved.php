<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 * Added by zouloufr
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/migrations
 */

namespace tierra\topicsolved\migrations;

class install_topicsolved extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['topicsolved_version']) && version_compare($this->config['topicsolved_version'], '0.1.0', '>=');
	}

	public function update_schema()
	{
		return array(
			'add_columns'        => array(
				$this->table_prefix . 'forums'        => array(
					'forum_allow_solve'		  		=> array('UINT:1', 0),
					'forum_allow_unsolve'	  		=> array('UINT:1', 0),
					'forum_lock_solved'		  		=> array('UINT:1', 0),
					'forum_solve_text'				=> array('VCHAR:25', ''),
					'forum_solve_color'				=> array('VCHAR:7', ''),
				),
				$this->table_prefix . 'topics'		=> array(
					'topic_solved'		  			=> array('UINT:8', 0),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'        => array(
				$this->table_prefix . 'forums'        => array(
					'forum_allow_solve',
					'forum_allow_unsolve',
					'forum_lock_solved',
					'forum_solve_text',
					'forum_solve_color'
				),
				$this->table_prefix . 'topics'		=> array(
					'topic_solved'
				),
			),
		);
	}
	public function update_data()
	{
		return array(
			array('config.add', array('topicsolved_version', '0.1.0')),
		);
	}
}
