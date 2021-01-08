<?php

/**
 * プラグインの全てのフック管理機能
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 */

/**
 * プラグインの全てのフックを登録する
 *
 * プラグイン全体で登録されるフックの一覧を管理します。
 * run関数を呼び出してアクションやフィルタの登録を行います。
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 * @author     ton <no1.neet.professional@gmail.com>
 */
class Neet_Sample_Plugin_Loader {

	/**
	 * 登録されるアクション一覧配列
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $actions    登録されるアクション一覧
	 */
	protected $actions;

	/**
	 * 登録されるフィルター一覧配列
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $filters    登録されるフィルター一覧
	 */
	protected $filters;

	/**
	 * アクションとフィルタを管理するコレクションを初期化します。
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	/**
	 * 登録するアクションを追加します。
	 *
	 * @since    1.0.0
	 * @param    string               $hook             フックのタグ名
	 * @param    object               $component        コールバック関数が定義されているオブジェクト
	 * @param    string               $callback         フックに登録される関数
	 * @param    int                  $priority         優先度。デフォルトは10
	 * @param    int                  $accepted_args    コールバック関数に渡される引数の数。デフォルトは1
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * 登録するフィルターを追加します。
	 *
	 * @since    1.0.0
	 * @param    string               $hook             フックのタグ名
	 * @param    object               $component        コールバック関数が定義されているオブジェクト
	 * @param    string               $callback         フックに登録される関数
	 * @param    int                  $priority         優先度。デフォルトは10
	 * @param    int                  $accepted_args    コールバック関数に渡される引数の数。デフォルトは1
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * アクションとフィルターを1つのコレクションに追加するための関数
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $hooks            actionsまたはfiltersのコレクション
	 * @param    string               $hook             フックのタグ名
	 * @param    object               $component        コールバック関数が定義されているオブジェクト
	 * @param    string               $callback         フックに登録される関数
	 * @param    int                  $priority         優先度
	 * @param    int                  $accepted_args    コールバック関数に渡される引数の数
	 * @return   array                                  追加し終えたactionsまたはfiltersのコレクション
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

	/**
	 * WordPressにアクションとフィルターを登録する
	 *
	 * @since    1.0.0
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

	}

}
