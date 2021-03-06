<?php

/**
 * 公開部分特有の処理
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/public
 */

/**
 * 公開部分特有の処理
 *
 * プラグイン名、バージョン、公開部分のスタイルシートとJavaScriptの設定を定義する
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/public
 * @author     ton <no1.neet.professional@gmail.com>
 */
class Neet_Sample_Plugin_Public {

	/**
	 * プラグインのID
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    プラグインのID
	 */
	private $plugin_name;

	/**
	 * プラグインのバージョン
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    プラグインのバージョン
	 */
	private $version;

	/**
	 * プロパティの設定を行い、初期化する
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       プラグインのID
	 * @param      string    $version    プラグインのバージョン
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * 公開部分のスタイルシートを登録する
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * 本機能はデモ用です。
		 *
		 * スタイルシートをキューに入れる。
		 * この関数はローダーにより、フックとして登録される。
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/neet-sample-plugin-public.css', array(), $this->version, 'all' );

	}

	/**
	 * 公開部分のJavaScriptを登録する
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * 本機能はデモ用です。
		 *
		 * スクリプトをキューに入れる。
		 * この関数はローダーにより、フックとして登録される。
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/neet-sample-plugin-public.js', array( 'jquery' ), $this->version, false );

	}

}
