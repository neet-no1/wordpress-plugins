<?php

/**
 * 国際化機能の定義
 *
 * 国際化ファイルをロードし翻訳の準備を行います。
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 */

/**
 * 国際化機能の定義
 *
 * 国際化ファイルをロードし翻訳の準備を行います。
 *
 * @since      1.0.0
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 * @author     ton <no1.neet.professional@gmail.com>
 */
class Neet_Sample_Plugin_i18n {


	/**
	 * 翻訳のためにプラグインのテキストドメインをロードします。
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'neet-sample-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
