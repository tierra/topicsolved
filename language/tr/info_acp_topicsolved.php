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
	'ALLOW_SOLVE'                => 'Konuların çözüldü olarak işaretlemesine izni ver',
	'ALLOW_SOLVE_EXPLAIN'        => 'Konuyu başlatana veya moderatöre konuyu çözüldü olarak ayarlama yetkisi ver. Moderatörler konuları tüm evet-seçeneklerinde çözüldü olarak ayarlayabilirler.',
	'ALLOW_UNSOLVE'              => 'Konuların yeniden açılmasına izin ver',
	'ALLOW_UNSOLVE_EXPLAIN'      => 'Kullanıcılara veya moderatörler bir konuyu yeniden çözülmedi olarak ayarlama yetkisi ver. Moderatörler konuları tüm evet-seçeneklerinde çözülmedi olarak ayarlayabilirler.',
	'LOCK_SOLVED'                => 'Çözülmüş konuları kilitle',
	'LOCK_SOLVED_EXPLAIN'        => 'Unutmayın ki sadece moderatörler kilitli konuları yeniden açabilir.',
	'TOPIC_SOLVED_SETTINGS'      => 'Konu Çözüldü ayarları',
	'FORUM_SOLVE_TEXT'           => 'Çözüldü-resmi yerine metin seçin',
	'FORUM_SOLVE_TEXT_EXPLAIN'   => 'Konu çözüldü resimi yerine bazı meyinleri seçebilirsiniz. Ör: [ÇÖZÜLDÜ] veya [SATILDI] veya herhangi bir şey. Konu çözüldü resmin kullanmak için boş bırakın.',
	'FORUM_SOLVE_COLOUR'         => 'Metin için renk',
	'FORUM_SOLVE_COLOUR_EXPLAIN' => 'Metin için bir renk seçin. Varsayılan rengi kullanmak için boş bırakın.',
	'YES_MOD'                    => 'Evet, moderatör',

	'IMG_ICON_TOPIC_SOLVED_HEAD'    => 'Konu Çözüldü',
	'IMG_ICON_TOPIC_SOLVED_LIST'    => 'Konu Çözüldü',
	'IMG_ICON_TOPIC_SOLVED_POST'    => 'Konu Çözüldü',
	'IMG_ICON_TOPIC_SOLVED_SET'     => 'Bu cevabı kabul et',
	'IMG_ICON_TOPIC_SOLVED_UNSET'   => 'Konuyu çözülmedi olarak işaretle',
));
