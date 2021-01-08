<?php

/**
 * Plugin Name:       neet-sample-plugin
 * Plugin URI:        https://neet-professional.com/
 * Description:       create plugin sample
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            TON(Top of neet)
 * Author URI:        https://github.com/neet-no1
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       neet-sample-plugin
 * Domain Path:       /languages
 */

// このファイルが直接呼び出されたらエラーとする。
// WordPressから呼び出しされたときは`WPINC`定数が定義されている模様。
if ( ! defined( 'WPINC' ) ) {
	die;
}

// プラグインのバージョンを指定
define( 'NEET_SAMPLE_PLUGIN_VERSION', '1.0.0' );

// プラグインの有効化
function activate_neet_sample_plugin() {

	// 有効化用のPHPを読み込み
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-neet-sample-plugin-activator.php';

	// activate関数を呼び出し
	Neet_Sample_Plugin_Activator::activate();
}

// 有効化のフックを登録
// 有効化ボタンを押したときに指定した関数が呼び出される
register_activation_hook( __FILE__, 'activate_neet_sample_plugin' );

// プラグインの無効化
function deactivate_neet_sample_plugin() {

	// 無効化用のPHPを読み込み
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-neet-sample-plugin-deactivator.php';

	// deactivate関数を呼び出し
	Neet_Sample_Plugin_Deactivator::deactivate();
}

// 無効化のフックを登録
// 無効化ボタンを押したときに指定した関数が呼び出される
register_deactivation_hook( __FILE__, 'deactivate_neet_sample_plugin' );

// プラグインの中心となるPHPファイルを読み込み
require plugin_dir_path( __FILE__ ) . 'includes/class-neet-sample-plugin.php';

// プラグインの処理を開始する関数
function run_neet_sample_plugin() {

	// インスタンスを生成する(コンストラクタを実行)
	$plugin = new Neet_Sample_Plugin();

	// run関数を実行
	$plugin->run();

}

// プラグインの処理を開始する
run_neet_sample_plugin();
