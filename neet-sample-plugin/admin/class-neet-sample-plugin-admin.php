<?php

/**
 * �Ǘ��������L�̏���
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/admin
 */

/**
 * �Ǘ��������L�̏���
 *
 * �v���O�C�����A�o�[�W�����A�Ǘ������̃X�^�C���V�[�g��JavaScript�̐ݒ���`����
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/admin
 * @author     ton <no1.neet.professional@gmail.com>
 */
class Neet_Sample_Plugin_Admin {

	/**
	 * �v���O�C����ID
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    �v���O�C����ID
	 */
	private $plugin_name;

	/**
	 * �v���O�C���̃o�[�W����
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    �v���O�C���̃o�[�W����
	 */
	private $version;

	/**
	 * �v���p�e�B�̐ݒ���s���A����������
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       �v���O�C����ID
	 * @param      string    $version    �v���O�C���̃o�[�W����
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * �Ǘ������̃X�^�C���V�[�g��o�^����
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * �{�@�\�̓f���p�ł��B
		 *
		 * �X�^�C���V�[�g���L���[�ɓ����B
		 * ���̊֐��̓��[�_�[�ɂ��A�t�b�N�Ƃ��ēo�^�����B
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/neet-sample-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * �Ǘ�������JavaScript��o�^����
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * �{�@�\�̓f���p�ł��B
		 *
		 * �X�N���v�g���L���[�ɓ����B
		 * ���̊֐��̓��[�_�[�ɂ��A�t�b�N�Ƃ��ēo�^�����B
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/neet-sample-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

}