<?php

/**
 * ���ۉ��@�\�̒�`
 *
 * ���ۉ��t�@�C�������[�h���|��̏������s���܂��B
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 */

/**
 * ���ۉ��@�\�̒�`
 *
 * ���ۉ��t�@�C�������[�h���|��̏������s���܂��B
 *
 * @since      1.0.0
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 * @author     ton <no1.neet.professional@gmail.com>
 */
class Neet_Sample_Plugin_i18n {


	/**
	 * �|��̂��߂Ƀv���O�C���̃e�L�X�g�h���C�������[�h���܂��B
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
