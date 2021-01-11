<?php

/**
 * �v���O�C���̃R�A�N���X�̒�`�t�@�C��
 *
 * �T�C�g�̌��J�����ƊǗ������̗����̊֐����܂�
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 */

/**
 * �v���O�C���̃R�A�N���X
 *
 * �t�b�N�̒�`���s���܂��B
 *
 * ���̃v���O�C������ӂɎ��ʂ��邽�߂̕�������ێ����܂��B
 *
 * @since      1.0.0
 * @package    Neet_Sample_Plugin
 * @subpackage Neet_Sample_Plugin/includes
 * @author     ton <no1.neet.professional@gmail.com>
 */
class Neet_Sample_Plugin {

    /**
     * �v���O�C���̑S�Ẵt�b�N���ێ��E�o�^���邽�߂̃��[�_�[
     *
     * @since    1.0.0
     * @access   protected
     * @var      Neet_Sample_Plugin_Loader    $loader    �S�Ẵt�b�N���Ǘ�
     */
    protected $loader;

    /**
     * �v���O�C����ID
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    ���̃v���O�C������ӂɎ��ʂ��邽�߂̕�����
     */
    protected $plugin_name;

    /**
     * �v���O�C���̌��݂̃o�[�W����
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    �v���O�C���̌��݂̃o�[�W����
     */
    protected $version;

    /**
     * �v���O�C���̃R�A�@�\���`����
     *
     * �v���O�C����ID�ƃo�[�W������ݒ肵�܂��B
     * �ˑ��֌W�����[�h���܂��B
     * ���P�[�����`���܂��B
     * �Ǘ������ƌ��J�����̃t�b�N���`���܂��B
     *
     * @since    1.0.0
     */
    public function __construct() {
        // �o�[�W��������`����Ă����炻�̂܂܎g�p����
        if ( defined( 'NEET_SAMPLE_PLUGIN_VERSION' ) ) {
            $this->version = NEET_SAMPLE_PLUGIN_VERSION;
        } else {
            $this->version = '1.0.0';
        }

        // �v���O�C����ID���`����
        $this->plugin_name = 'neet-sample-plugin';

        // �ˑ��֌W�����[�h����
        $this->load_dependencies();

        // ���P�[�����`����
        $this->set_locale();

        // �Ǘ������̃t�b�N���`
        $this->define_admin_hooks();

        // ���J�����̃t�b�N���`
        $this->define_public_hooks();

    }

    /**
     * �v���O�C���ɕK�v�Ȉˑ��֌W�����[�h���܂��B
     *
     * �v���O�C�����\������ȉ��̃t�@�C�������[�h���܂��F
     *
     * - Neet_Sample_Plugin_Loader. ���[�_�[�B�v���O�C���̑S�Ẵt�b�N�̊Ǘ��@�\�B
     * - Neet_Sample_Plugin_i18n. ���ۉ��@�\���`�B
     * - Neet_Sample_Plugin_Admin. �Ǘ������̑S�Ẵt�b�N���`�B
     * - Neet_Sample_Plugin_Public. ���J�����̑S�Ẵt�b�N���`�B
     *
     * ���[�_�[�̃C���X�^���X�𐶐����܂��B
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * �R�A�v���O�C���̃A�N�V�����ƃt�B���^�̊Ǘ�������N���X
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-neet-sample-plugin-loader.php';

        /**
         * �v���O�C���̍��ۉ��@�\���`����N���X
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-neet-sample-plugin-i18n.php';

        /**
         * �Ǘ������̑S�Ẵt�b�N���`����N���X
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-neet-sample-plugin-admin.php';

        /**
         * ���J�����̑S�Ẵt�b�N���`����N���X
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-neet-sample-plugin-public.php';

        $this->loader = new Neet_Sample_Plugin_Loader();

    }

    /**
     * ���ۉ��̂��߂ɁA���̃v���O�C���̃��P�[�����`���܂��B
     *
     * Neet_Sample_Plugin_i18n�N���X���g�p���āA�h���C���ƃt�b�N��o�^���܂��B
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        // ���ۉ��@�\�N���X�̃C���X�^���X����
        $plugin_i18n = new Neet_Sample_Plugin_i18n();

        // $plugin_i18n->load_plugin_textdomain���t�b�N�ɓo�^����
        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    /**
     * �Ǘ������Ɋ֘A���邷�ׂẴt�b�N��o�^���܂��B
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        // �Ǘ������̃t�b�N��`�N���X�̃C���X�^���X����
        $plugin_admin = new Neet_Sample_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );

        // $plugin_admin->enqueue_styles���t�b�N�ɓo�^
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );

        // $plugin_admin->enqueue_scripts���t�b�N�ɓo�^
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

        // $plugin_admin->neet_options_page���t�b�N�ɓo�^
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'neet_options_page' );

        // $plugin_admin->neet_sub_options_page���t�b�N�ɓo�^
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'neet_sub_options_page' );
    }

    /**
     * ���J�����Ɋւ��邷�ׂẴt�b�N��o�^���܂��B
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {

        // ���J�����̃t�b�N��`�N���X�̃C���X�^���X����
        $plugin_public = new Neet_Sample_Plugin_Public( $this->get_plugin_name(), $this->get_version() );

        // $plugin_public->enqueue_styles���t�b�N�ɓo�^
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );

        // $plugin_public->enqueue_scripts���t�b�N�ɓo�^
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    }

    /**
     * ���[�_�[�����s���āA�S�Ẵt�b�N��o�^���܂��B
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * �v���O�C����ID���擾����B
     *
     * @since     1.0.0
     * @return    string    �v���O�C����ID
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * ���[�_�[���擾����B
     *
     * @since     1.0.0
     * @return    Plugin_Name_Loader    �v���O�C���̑S�Ẵt�b�N�̊Ǘ��@�\
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * �o�[�W�������擾����
     *
     * @since     1.0.0
     * @return    string    �o�[�W����
     */
    public function get_version() {
        return $this->version;
    }

}
