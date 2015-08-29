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
	'ALLOW_SOLVE'                => 'السماح بتغيير حالة المواضيع إلى "تمت الإجابة" ',
	'ALLOW_SOLVE_EXPLAIN'        => 'كاتب الموضوع أو المشرف يستطيع إضافة "تمت الإجابة" إلى الموضوع. يستطيع المشرفين إضافة "تمت الإجابة" في كلا الخيارين "نعم".',
	'ALLOW_UNSOLVE'              => 'السماح بإعادة الموضوع إلى "بدون إجابة" ',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'الأعضاء أو المشرفين يستطيعون إعادة الموضوع إلى الحالة : "بدون إجابة". يستطيع المشرفين إضافة "بدون إجابة" في كلا الخيارين "نعم".',
	'LOCK_SOLVED'                => 'إغلاق المواضيع التي تمت الإجابة عليها ',
	'LOCK_SOLVED_EXPLAIN'        => 'المشرفين فقط يستطيعون إعادة فتح المواضيع المُغلقة.',
	'TOPIC_SOLVED_SETTINGS'      => 'إعدادات المواضيع التي تم الإجابة عليها',
	'FORUM_SOLVE_TEXT'           => 'النص ',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'تستطيع كتابة نص بدلاً من الصورة الخاصة بالإجابة. مثال : [تمت الإجابة] أو [مُباع] أو أي نص آخر. سيتم إستخدام الصورة لو تركت هذا الحقل فارغاً.',
	'FORUM_SOLVE_COLOUR'         => 'لون النص ',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'حدد اللون للنص الذي كتبته في الخيار أعلاه. سوف يتم استخدام اللون الإفتراضي لو تركت هذا الحقل فارغاً.',
	'YES_MOD'                    => 'نعم ( للمشرف فقط )',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'تمت الإجابة على الموضوع',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'تمت الإجابة على الموضوع',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'تمت الإجابة على الموضوع',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'الموافقة على هذه الإجابة',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'إجعل الموضوع بدون إجابة',
));
