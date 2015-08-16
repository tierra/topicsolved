<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/language
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ALLOW_SOLVE'                => 'Tillad at emner blive markeret som løst',
	'ALLOW_SOLVE_EXPLAIN'        => 'Giv brugeren der oprettede emnet eller redaktør muligheden for at sætte et emne som løst. Redaktør kan løse emner ved begge ja-valg.',
	'ALLOW_UNSOLVE'              => 'Tillad at emner genåbnes',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Giv brugere eller redaktør evnen til sætte et emne tilbage til ikke-løst. Redaktør kan fjerne løst fra emner ved begge ja-valg.',
	'LOCK_SOLVED'                => 'Lås løste emner',
	'LOCK_SOLVED_EXPLAIN'        => 'Bemærk kun redaktør kan gen åbne et låst emne.',
	'TOPIC_SOLVED_SETTINGS'      => 'Emne løst indstillinger',
	'FORUM_SOLVE_TEXT'           => 'Brug tekst i stedet for løst-billed',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Du kan bruge tekst istedet for det pæne emne-løst-billede. F.eks. [LØST], [SOLGT] eller noget andet. Lad feltet være tomt for at bruge emne-løst-billedet.',
	'FORUM_SOLVE_COLOUR'         => 'Farve til teksten',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Vælg en farve til teksten. Lad feltet være tomt for at bruge standard farven.',
	'YES_MOD'                    => 'Ja, redaktør',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Emnet er løst',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Emnet er løst',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Emnet er løst',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Acceptér dette svar',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Marker emnet som ikke-løst',
));
