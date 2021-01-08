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

// ���̃t�@�C�������ڌĂяo���ꂽ��G���[�Ƃ���B
// WordPress����Ăяo�����ꂽ�Ƃ���`WPINC`�萔����`����Ă���͗l�B
if ( ! defined( 'WPINC' ) ) {
	die;
}

// �v���O�C���̃o�[�W�������w��
define( 'NEET_SAMPLE_PLUGIN_VERSION', '1.0.0' );

// �v���O�C���̗L����
function activate_neet_sample_plugin() {

	// �L�����p��PHP��ǂݍ���
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-neet-sample-plugin-activator.php';

	// activate�֐����Ăяo��
	Neet_Sample_Plugin_Activator::activate();
}

// �L�����̃t�b�N��o�^
// �L�����{�^�����������Ƃ��Ɏw�肵���֐����Ăяo�����
register_activation_hook( __FILE__, 'activate_neet_sample_plugin' );

// �v���O�C���̖�����
function deactivate_neet_sample_plugin() {

	// �������p��PHP��ǂݍ���
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-neet-sample-plugin-deactivator.php';

	// deactivate�֐����Ăяo��
	Neet_Sample_Plugin_Deactivator::deactivate();
}

// �������̃t�b�N��o�^
// �������{�^�����������Ƃ��Ɏw�肵���֐����Ăяo�����
register_deactivation_hook( __FILE__, 'deactivate_neet_sample_plugin' );

// �v���O�C���̒��S�ƂȂ�PHP�t�@�C����ǂݍ���
require plugin_dir_path( __FILE__ ) . 'includes/class-neet-sample-plugin.php';

// �v���O�C���̏������J�n����֐�
function run_neet_sample_plugin() {

	// �C���X�^���X�𐶐�����(�R���X�g���N�^�����s)
	$plugin = new Neet_Sample_Plugin();

	// run�֐������s
	$plugin->run();

}

// �v���O�C���̏������J�n����
run_neet_sample_plugin();
