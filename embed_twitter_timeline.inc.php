<?php

/*
 * embed_twitter_timeline.inc.php
 *
 * Twitterタイムライン組込プラグイン
 *
 * @author		オヤジ戦隊ダジャレンジャー <red@dajya-ranger.com>
 * @copyright	Copyright © 2019, dajya-ranger.com
 * @link		https://dajya-ranger.com/pukiwiki/embed-twitter-timeline/
 * @example		#embed_twitter_timeline
 * @license		Apache License 2.0
 * @since 		0.1.0 2019/08/03 タイムラインのその他のオプションにちゃんと対応
 * @since 		0.1.1 2019/07/12 プラグイン名を変更・タイムライン幅の無指定をデフォルトにする（指定も可）
 * @since 		0.1.0 2019/06/19 暫定初公開
 *
 */

function plugin_embed_twitter_timeline_convert() {
	// ブロック型プラグイン（#embed_twitter_timeline）として動作
	// ※基本的に「UserName」部分を自分のTwitterユーザ名に変更すればOK
	$params = array(
		'width'	 => '300',					// 横幅（※当関数デフォルト無視）
		'height' => '600',					// 高さ
		'theme'	 => 'light',				// テーマ（light／dark）
		'link'	 => '#2B7BB9',				// リンクカラー（デフォルト#2B7BB9）
		'href'	 => 'https://twitter.com/UserName?ref_src=twsrc%5Etfw',
		'by'	 => 'Tweets by UserName'	// ※指定しても画面に変化はない
	);

$html_code = <<< EOM
<a class="twitter-timeline" data-height="{$params['height']}"  data-theme="{$params['theme']}" data-link-color="{$params['link']}" href="{$params['href']}">{$params['by']}</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
EOM;

/* タイムラインの横幅を指定する場合はこちらのコードを利用して下さい

$html_code = <<< EOM
<a class="twitter-timeline" data-width="{$params['width']}" data-height="{$params['height']}"  data-theme="{$params['theme']}" data-link-color="{$params['link']}" href="{$params['href']}">{$params['by']}</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
EOM;

*/
	return $html_code;
}

function plugin_embed_twitter_timeline_inline() {
	// インライン型プラグイン（&embed_twitter_timeline;）としては動作しない
	$args = func_get_args();
	return call_user_func_array('plugin_embed_twitter_timeline_convert', $args);
}

?>
