<?php
	function neet_options_page_html() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // �o�^���ꂽ�ݒ� "neet_options "�̃Z�L�����e�B�t�B�[���h���o�͂���
        settings_fields( 'neet_options' );
        // �o�͐ݒ蕔�Ƃ��̃t�B�[���h
        // (�Z�N�V������ "neet "�ɓo�^����Ă���A�e�t�B�[���h�͓���̃Z�N�V�����ɓo�^����Ă��܂��B)
        do_settings_sections( 'neet' );
        // �o�͕ۑ��ݒ�{�^��
        submit_button( __( 'Save Settings', 'textdomain' ) );
        ?>
      </form>
    </div>
    <?php
	}
?>