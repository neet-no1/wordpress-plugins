<?php

/**
 * �v���O�C���̑S�Ẵt�b�N�Ǘ��@�\
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 */

/**
 * �v���O�C���̑S�Ẵt�b�N��o�^����
 *
 * �v���O�C���S�̂œo�^�����t�b�N�̈ꗗ���Ǘ����܂��B
 * run�֐����Ăяo���ăA�N�V������t�B���^�̓o�^���s���܂��B
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 * @author     ton <no1.neet.professional@gmail.com>
 */
class Neet_Sample_Plugin_Loader {

	/**
	 * �o�^�����A�N�V�����ꗗ�z��
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $actions    �o�^�����A�N�V�����ꗗ
	 */
	protected $actions;

	/**
	 * �o�^�����t�B���^�[�ꗗ�z��
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $filters    �o�^�����t�B���^�[�ꗗ
	 */
	protected $filters;

	/**
	 * �A�N�V�����ƃt�B���^���Ǘ�����R���N�V���������������܂��B
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	/**
	 * �o�^����A�N�V������ǉ����܂��B
	 *
	 * @since    1.0.0
	 * @param    string               $hook             �t�b�N�̃^�O��
	 * @param    object               $component        �R�[���o�b�N�֐�����`����Ă���I�u�W�F�N�g
	 * @param    string               $callback         �t�b�N�ɓo�^�����֐�
	 * @param    int                  $priority         �D��x�B�f�t�H���g��10
	 * @param    int                  $accepted_args    �R�[���o�b�N�֐��ɓn���������̐��B�f�t�H���g��1
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * �o�^����t�B���^�[��ǉ����܂��B
	 *
	 * @since    1.0.0
	 * @param    string               $hook             �t�b�N�̃^�O��
	 * @param    object               $component        �R�[���o�b�N�֐�����`����Ă���I�u�W�F�N�g
	 * @param    string               $callback         �t�b�N�ɓo�^�����֐�
	 * @param    int                  $priority         �D��x�B�f�t�H���g��10
	 * @param    int                  $accepted_args    �R�[���o�b�N�֐��ɓn���������̐��B�f�t�H���g��1
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * �A�N�V�����ƃt�B���^�[��1�̃R���N�V�����ɒǉ����邽�߂̊֐�
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $hooks            actions�܂���filters�̃R���N�V����
	 * @param    string               $hook             �t�b�N�̃^�O��
	 * @param    object               $component        �R�[���o�b�N�֐�����`����Ă���I�u�W�F�N�g
	 * @param    string               $callback         �t�b�N�ɓo�^�����֐�
	 * @param    int                  $priority         �D��x
	 * @param    int                  $accepted_args    �R�[���o�b�N�֐��ɓn���������̐�
	 * @return   array                                  �ǉ����I����actions�܂���filters�̃R���N�V����
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
	 * WordPress�ɃA�N�V�����ƃt�B���^�[��o�^����
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
