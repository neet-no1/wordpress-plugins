<?php

/**
 * プラグインのコアクラスの定義ファイル
 *
 * サイトの公開部分と管理部分の両方の関数を含む
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 */

/**
 * プラグインのコアクラス
 *
 * フックの定義を行います。
 *
 * このプラグインを一意に識別するための文字列も保持します。
 *
 * @since      1.0.0
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 * @author     ton <no1.neet.professional@gmail.com>
 */
class Neet_Sample_Plugin {

    /**
     * プラグインの全てのフックを維持・登録するためのローダー
     *
     * @since    1.0.0
     * @access   protected
     * @var      Neet_Sample_Plugin_Loader    $loader    全てのフックを管理
     */
    protected $loader;

    /**
     * プラグインのID
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    このプラグインを一意に識別するための文字列
     */
    protected $plugin_name;

    /**
     * プラグインの現在のバージョン
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    プラグインの現在のバージョン
     */
    protected $version;

    /**
     * プラグインのコア機能を定義する
     *
     * プラグインのIDとバージョンを設定します。
     * 依存関係をロードします。
     * ロケールを定義します。
     * 管理部分と公開部分のフックを定義します。
     *
     * @since    1.0.0
     */
    public function __construct() {
        // バージョンが定義されていたらそのまま使用する
        if ( defined( 'NEET_SAMPLE_PLUGIN_VERSION' ) ) {
            $this->version = NEET_SAMPLE_PLUGIN_VERSION;
        } else {
            $this->version = '1.0.0';
        }

        // プラグインのIDを定義する
        $this->plugin_name = 'neet-sample-plugin';

        // 依存関係をロードする
        $this->load_dependencies();

        // ロケールを定義する
        $this->set_locale();

        // 管理部分のフックを定義
        $this->define_admin_hooks();

        // 公開部分のフックを定義
        $this->define_public_hooks();

    }

    /**
     * プラグインに必要な依存関係をロードします。
     *
     * プラグインを構成する以下のファイルをロードします：
     *
     * - Neet_Sample_Plugin_Loader. ローダー。プラグインの全てのフックの管理機能。
     * - Neet_Sample_Plugin_i18n. 国際化機能を定義。
     * - Neet_Sample_Plugin_Admin. 管理部分の全てのフックを定義。
     * - Neet_Sample_Plugin_Public. 公開部分の全てのフックを定義。
     *
     * ローダーのインスタンスを生成します。
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * コアプラグインのアクションとフィルタの管理をするクラス
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-neet-sample-plugin-loader.php';

        /**
         * プラグインの国際化機能を定義するクラス
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-neet-sample-plugin-i18n.php';

        /**
         * 管理部分の全てのフックを定義するクラス
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-neet-sample-plugin-admin.php';

        /**
         * 公開部分の全てのフックを定義するクラス
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-neet-sample-plugin-public.php';

        $this->loader = new Neet_Sample_Plugin_Loader();

    }

    /**
     * 国際化のために、このプラグインのロケールを定義します。
     *
     * Neet_Sample_Plugin_i18nクラスを使用して、ドメインとフックを登録します。
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        // 国際化機能クラスのインスタンス生成
        $plugin_i18n = new Neet_Sample_Plugin_i18n();

        // $plugin_i18n->load_plugin_textdomainをフックに登録する
        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    /**
     * 管理部分に関連するすべてのフックを登録します。
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        // 管理部分のフック定義クラスのインスタンス生成
        $plugin_admin = new Neet_Sample_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );

        // $plugin_admin->enqueue_stylesをフックに登録
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );

        // $plugin_admin->enqueue_scriptsをフックに登録
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

        // $plugin_admin->neet_options_pageをフックに登録
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'neet_options_page' );
    }

    /**
     * 公開部分に関するすべてのフックを登録します。
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {

        // 公開部分のフック定義クラスのインスタンス生成
        $plugin_public = new Neet_Sample_Plugin_Public( $this->get_plugin_name(), $this->get_version() );

        // $plugin_public->enqueue_stylesをフックに登録
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );

        // $plugin_public->enqueue_scriptsをフックに登録
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    }

    /**
     * ローダーを実行して、全てのフックを登録します。
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * プラグインのIDを取得する。
     *
     * @since     1.0.0
     * @return    string    プラグインのID
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * ローダーを取得する。
     *
     * @since     1.0.0
     * @return    Plugin_Name_Loader    プラグインの全てのフックの管理機能
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * バージョンを取得する
     *
     * @since     1.0.0
     * @return    string    バージョン
     */
    public function get_version() {
        return $this->version;
    }

}
