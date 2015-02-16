/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/styles/all/theme
 */

(function($) {

	'use strict';

	$('#forum_type').each(function () {
		$(this).change(set_topic_solved_options_display);
		set_topic_solved_options_display();
	});

	function set_topic_solved_options_display() {
		if ($('#forum_type').val() == 1) {
			$('#topic_solved_options').show();
		} else {
			$('#topic_solved_options').hide();
		}
	}

})(jQuery);
