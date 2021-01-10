<?php

/**
 * 管理部分特有の処理
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/admin
 */

/**
 * 管理部分特有の処理
 *
 * プラグイン名、バージョン、管理部分のスタイルシートとJavaScriptの設定を定義する
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/admin
 * @author     ton <no1.neet.professional@gmail.com>
 */

require_once WPNSP_PLUGIN_DIR . '/admin/includes/welcome-panel.php';

class Neet_Sample_Plugin_Admin {

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
	 * 管理部分のスタイルシートを登録する
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/neet-sample-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * 管理部分のJavaScriptを登録する
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/neet-sample-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * 管理部分に「Neetの設定」メニューを追加する
     *
     * @since    1.0.0
     */
     public function neet_options_page() {
         add_menu_page(
             // メニューページのタイトル
            'ニートの設定',
            // メニュー名
            'Neetの設定',
            // メニューの権限
            'manage_options',
            // メニューのスラッグ
            'neet',
            // メニューページのコールバック関数
            'neet_options_page_html',
            // メニューのアイコンURL
            plugin_dir_url(__FILE__) . 'images/icon_neet.png',
            // メニューの追加位置
            20
        );
    }
}
