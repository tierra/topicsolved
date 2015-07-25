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
class topicsolved_functional_acp_forums_test extends functional_test_case
{
	/**
	 * Authenticate for testing ACP features.
	 */
	protected function forums_manage_login()
	{
		$this->login();
		$this->admin_login();
		$this->add_lang(array('acp/forums'));
	}

	/**
	 * Return the URL for forum edit.
	 */
	protected function get_url()
	{
		return 'adm/index.php?i=acp_forums&mode=manage&action=edit';
	}

	/**
	 * Test ACP forums form.
	 */
	public function test_acp_forums()
	{
		$this->forums_manage_login();
		$crawler = self::request('GET', $this->get_url() . "&f=2&sid=" . $this->sid);

		// Ensure extension and ACP language was loaded.
		$this->assertContainsLang('ALLOW_SOLVE', $crawler->text());

		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$form->setValues(array(
			'forum_allow_solve' => 1,
			'forum_allow_unsolve' => 1,
			'forum_lock_solved' => 1,
			'forum_solve_text' => '[TEST]',
			'forum_solve_color' => 'FF0000',
		));
		$crawler = self::submit($form);

		// Form submission should be a success.
		$this->assertContainsLang('FORUM_UPDATED', $crawler->text());
	}
}